<?php

namespace App\Http\Controllers\Api;

use App\Services\ContinueStudyRequestService;
use App\Services\RequestService;
use App\Http\Requests\Api\ContinueStudyRequestRequest;
use App\Constants\AppRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponse;
use App\Http\Resources\RequestResource;

class ContinueStudyRequestController extends ApiController
{
    use ApiResponse;
    /**
     * @var RequestService
     */
    private $requestService;
    /**
     * @var ContinueStudyRequestService
     */
    private $continueStudyRequestService;

    public function __construct(
        RequestService $requestService,
        ContinueStudyRequestService $continueStudyRequestService
    ) {
        $this->requestService = $requestService;
        $this->continueStudyRequestService = $continueStudyRequestService;
        parent::__construct();
    }

    /**
     * @param ContinueStudyRequestRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContinueStudyRequestRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $request->user();
            $userId = $user->id;

            $newRequest = $this->requestService->createRequest($user, AppRequest::TYPE_CONTINUE_STUDY);

            $params = $request->all();
            $params['request_id'] = $newRequest->id;

            $this->continueStudyRequestService->store($params);
            
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
