<?php

namespace App\Http\Controllers\Api;

use App\Services\NotFinishedSubjectRequestService;
use App\Services\RequestService;
use App\Http\Requests\Api\NotFinishedSubjectRequestRequest;
use App\Constants\AppRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponse;
use App\Http\Resources\RequestResource;

class NotFinishedSubjectRequestController extends ApiController
{
    use ApiResponse;
    /**
     * @var RequestService
     */
    private $requestService;
    /**
     * @var NotFinishedSubjectRequestService
     */
    private $notFinishedSubjectRequestService;

    public function __construct(
        RequestService $requestService,
        NotFinishedSubjectRequestService $notFinishedSubjectRequestService
    ) {
        $this->requestService = $requestService;
        $this->notFinishedSubjectRequestService = $notFinishedSubjectRequestService;
        parent::__construct();
    }

    /**
     * @param NotFinishedSubjectRequestRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotFinishedSubjectRequestRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $request->user();
            $userId = $user->id;

            $newRequest = $this->requestService->createRequest($user, AppRequest::TYPE_NOT_FINISHED_SUBJECT);

            $params = $request->all();
            $params['request_id'] = $newRequest->id;

            $this->notFinishedSubjectRequestService->store($params);
            
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
