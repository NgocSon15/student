<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\PointConfirmRequestService;
use App\Services\RequestService;
use App\Http\Requests\Api\PointConfirmRequestRequest;
use App\Constants\AppRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponse;
use App\Http\Resources\RequestResource;

class PointConfirmRequestController extends ApiController
{
    use ApiResponse;
    /**
     * @var RequestService
     */
    private $requestService;
    /**
     * @var PointConfirmRequestService
     */
    private $pointConfirmRequestService;

    public function __construct(
        RequestService $requestService,
        PointConfirmRequestService $pointConfirmRequestService
    ) {
        $this->requestService = $requestService;
        $this->pointConfirmRequestService = $pointConfirmRequestService;
        parent::__construct();
    }

    /**
     * @param PointConfirmRequestRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PointConfirmRequestRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $request->user();

            $newRequest = $this->requestService->createRequest($user, AppRequest::TYPE_POINT_CONFIRM);

            $params = $request->all();
            $params['request_id'] = $newRequest->id;
            $params['fee'] = AppRequest::REQUEST_FEES[AppRequest::TYPE_POINT_CONFIRM];

            $this->pointConfirmRequestService->store($params);
            
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
