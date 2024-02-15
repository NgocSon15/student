<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\PauseExamRequestService;
use App\Services\RequestService;
use App\Http\Requests\Api\PauseExamRequestRequest;
use App\Constants\AppRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponse;
use App\Http\Resources\RequestResource;

class PauseExamRequestController extends ApiController
{
    use ApiResponse;
    /**
     * @var RequestService
     */
    private $requestService;
    /**
     * @var PauseExamRequestService
     */
    private $pauseExamRequestService;

    public function __construct(
        RequestService $requestService,
        PauseExamRequestService $pauseExamRequestService
    ) {
        $this->requestService = $requestService;
        $this->pauseExamRequestService = $pauseExamRequestService;
        parent::__construct();
    }

    /**
     * @param PauseExamRequestRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PauseExamRequestRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $request->user();
            $userId = $user->id;

            $newRequest = $this->requestService->store([
                'user_id' => $userId,
                'code' => '12345',
                'type' => AppRequest::TYPE_PAUSE_EXAM,
                'status' => AppRequest::STATUS_NOT_RECEIVED,
                'receive_date' => now()
            ]);

            $params = $request->all();
            $params['request_id'] = $newRequest->id;

            $this->pauseExamRequestService->store($params);
            
            DB::commit();
            return $this->sendSuccess(
                [
                    'request' => new RequestResource($newRequest)
                ],
            );
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->sendError($e, __('forms.messages.failed'));
        }
    }
}