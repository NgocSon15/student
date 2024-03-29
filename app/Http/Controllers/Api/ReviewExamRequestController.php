<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ReviewExamRequestService;
use App\Services\RequestService;
use App\Http\Requests\Api\ReviewExamRequestRequest;
use App\Constants\AppRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponse;
use App\Http\Resources\RequestResource;

class ReviewExamRequestController extends ApiController
{
    use ApiResponse;
    /**
     * @var RequestService
     */
    private $requestService;
    /**
     * @var ReviewExamRequestService
     */
    private $reviewExamRequestService;

    public function __construct(
        RequestService $requestService,
        ReviewExamRequestService $reviewExamRequestService
    ) {
        $this->requestService = $requestService;
        $this->reviewExamRequestService = $reviewExamRequestService;
        parent::__construct();
    }

    /**
     * @param ReviewExamRequestRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewExamRequestRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $request->user();

            $newRequest = $this->requestService->createRequest($user, AppRequest::TYPE_REVIEW_EXAM);

            $params = $request->all();
            $params['request_id'] = $newRequest->id;
            $params['fee'] = AppRequest::REQUEST_FEES[AppRequest::TYPE_REVIEW_EXAM];

            $this->reviewExamRequestService->store($params);
            
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
