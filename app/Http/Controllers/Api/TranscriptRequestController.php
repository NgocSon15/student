<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\TranscriptRequestService;
use App\Services\RequestService;
use App\Http\Requests\Api\TranscriptRequestRequest;
use App\Constants\AppRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponse;
use App\Http\Resources\RequestResource;

class TranscriptRequestController extends ApiController
{
    use ApiResponse;
    /**
     * @var RequestService
     */
    private $requestService;
    /**
     * @var TranscriptRequestService
     */
    private $transcriptRequestService;

    public function __construct(
        RequestService $requestService,
        TranscriptRequestService $transcriptRequestService
    ) {
        $this->requestService = $requestService;
        $this->transcriptRequestService = $transcriptRequestService;
        parent::__construct();
    }

    /**
     * @param TranscriptRequestRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TranscriptRequestRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $request->user();
            $userId = $user->id;

            $newRequest = $this->requestService->createRequest($user, AppRequest::TYPE_TRANSCRIPT);;

            $params = $request->all();
            $params['request_id'] = $newRequest->id;

            $this->transcriptRequestService->store($params);
            
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
