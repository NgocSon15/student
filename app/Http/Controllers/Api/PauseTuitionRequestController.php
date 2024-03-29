<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\PauseTuitionRequestService;
use App\Services\RequestService;
use App\Http\Requests\Api\PauseTuitionRequestRequest;
use App\Constants\AppRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponse;
use App\Http\Resources\RequestResource;

class PauseTuitionRequestController extends ApiController
{
    use ApiResponse;
    /**
     * @var RequestService
     */
    private $requestService;
    /**
     * @var PauseTuitionRequestService
     */
    private $pauseTuitionRequestService;

    public function __construct(
        RequestService $requestService,
        PauseTuitionRequestService $pauseTuitionRequestService
    ) {
        $this->requestService = $requestService;
        $this->pauseTuitionRequestService = $pauseTuitionRequestService;
        parent::__construct();
    }

    /**
     * @param PauseTuitionRequestRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PauseTuitionRequestRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $request->user();

            $newRequest = $this->requestService->createRequest($user, AppRequest::TYPE_PAUSE_TUITION);

            $params = $request->all();
            $params['request_id'] = $newRequest->id;
            $params['fee'] = AppRequest::REQUEST_FEES[AppRequest::TYPE_PAUSE_TUITION];

            $this->pauseTuitionRequestService->store($params);
            
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
