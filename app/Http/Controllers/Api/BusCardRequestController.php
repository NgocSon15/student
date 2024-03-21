<?php

namespace App\Http\Controllers\Api;

use App\Services\BusCardRequestService;
use App\Services\RequestService;
use App\Http\Requests\Api\BusCardRequestRequest;
use App\Constants\AppRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponse;
use App\Http\Resources\RequestResource;

class BusCardRequestController extends ApiController
{
    use ApiResponse;
    /**
     * @var RequestService
     */
    private $requestService;
    /**
     * @var BusCardRequestService
     */
    private $busCardRequestService;

    public function __construct(
        RequestService $requestService,
        BusCardRequestService $busCardRequestService
    ) {
        $this->requestService = $requestService;
        $this->busCardRequestService = $busCardRequestService;
        parent::__construct();
    }

    /**
     * @param BusCardRequestRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusCardRequestRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $request->user();

            $newRequest = $this->requestService->createRequest($user, AppRequest::TYPE_BUS_CARD);

            $params = $request->all();
            $params['request_id'] = $newRequest->id;
            $params['fee'] = AppRequest::REQUEST_FEES[AppRequest::TYPE_BUS_CARD];

            $this->busCardRequestService->store($params);
            
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
