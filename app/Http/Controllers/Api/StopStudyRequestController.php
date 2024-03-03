<?php

namespace App\Http\Controllers\Api;

use App\Services\StopStudyRequestService;
use App\Services\RequestService;
use App\Http\Requests\Api\StopStudyRequestRequest;
use App\Constants\AppRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponse;
use App\Http\Resources\RequestResource;

class StopStudyRequestController extends ApiController
{
    use ApiResponse;
    /**
     * @var RequestService
     */
    private $requestService;
    /**
     * @var StopStudyRequestService
     */
    private $stopStudyRequestService;

    public function __construct(
        RequestService $requestService,
        StopStudyRequestService $stopStudyRequestService
    ) {
        $this->requestService = $requestService;
        $this->stopStudyRequestService = $stopStudyRequestService;
        parent::__construct();
    }

    /**
     * @param StopStudyRequestRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StopStudyRequestRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $request->user();
            $userId = $user->id;

            $newRequest = $this->requestService->createRequest($user, AppRequest::TYPE_STOP_STUDY);;

            $params = $request->all();
            $params['request_id'] = $newRequest->id;

            $this->stopStudyRequestService->store($params);
            
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
