<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\SocialAssistanceRequestService;
use App\Services\RequestService;
use App\Http\Requests\Api\SocialAssistanceRequestRequest;
use App\Constants\AppRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponse;
use App\Http\Resources\RequestResource;

class SocialAssistanceRequestController extends ApiController
{
    use ApiResponse;
    /**
     * @var RequestService
     */
    private $requestService;
    /**
     * @var SocialAssistanceRequestService
     */
    private $socialAssistanceRequestService;

    public function __construct(
        RequestService $requestService,
        SocialAssistanceRequestService $socialAssistanceRequestService
    ) {
        $this->requestService = $requestService;
        $this->socialAssistanceRequestService = $socialAssistanceRequestService;
        parent::__construct();
    }

    /**
     * @param SocialAssistanceRequestRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocialAssistanceRequestRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $request->user();
            $userId = $user->id;

            $newRequest = $this->requestService->store([
                'user_id' => $userId,
                'code' => '12345',
                'type' => AppRequest::TYPE_SOCIAL_ASSISTANCE,
                'status' => AppRequest::STATUS_NOT_RECEIVED,
                'receive_date' => now()
            ]);

            $params = $request->all();
            $params['request_id'] = $newRequest->id;

            $this->socialAssistanceRequestService->store($params);
            
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
