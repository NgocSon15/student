<?php

namespace App\Http\Controllers\Api;

use App\Services\GoingAbroadRequestService;
use App\Services\RequestService;
use App\Http\Requests\Api\GoingAbroadRequestRequest;
use App\Constants\AppRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponse;
use App\Http\Resources\RequestResource;

class GoingAbroadRequestController extends ApiController
{
    use ApiResponse;
    /**
     * @var RequestService
     */
    private $requestService;
    /**
     * @var GoingAbroadRequestService
     */
    private $goingAbroadRequestService;

    public function __construct(
        RequestService $requestService,
        GoingAbroadRequestService $goingAbroadRequestService
    ) {
        $this->requestService = $requestService;
        $this->goingAbroadRequestService = $goingAbroadRequestService;
        parent::__construct();
    }

    /**
     * @param GoingAbroadRequestRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoingAbroadRequestRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $request->user();
            $userId = $user->id;

            $newRequest = $this->requestService->createRequest($user, AppRequest::TYPE_GOING_ABROAD);;

            $params = $request->all();
            $params['request_id'] = $newRequest->id;

            $this->goingAbroadRequestService->store($params);
            
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
