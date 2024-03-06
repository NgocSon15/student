<?php

namespace App\Http\Controllers\Api;

use App\Services\TuitionExemptionRequestService;
use App\Services\RequestService;
use App\Http\Requests\Api\TuitionExemptionRequestRequest;
use App\Constants\AppRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponse;
use App\Http\Resources\RequestResource;

class TuitionExemptionRequestController extends ApiController
{
    use ApiResponse;
    /**
     * @var RequestService
     */
    private $requestService;
    /**
     * @var TuitionExemptionRequestService
     */
    private $tuitionExemptionRequestService;

    public function __construct(
        RequestService $requestService,
        TuitionExemptionRequestService $tuitionExemptionRequestService
    ) {
        $this->requestService = $requestService;
        $this->tuitionExemptionRequestService = $tuitionExemptionRequestService;
        parent::__construct();
    }

    /**
     * @param TuitionExemptionRequestRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TuitionExemptionRequestRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $request->user();
            $userId = $user->id;

            $newRequest = $this->requestService->createRequest($user, AppRequest::TYPE_TUITION_EXEMPTION);

            $params = $request->all();
            $params['request_id'] = $newRequest->id;

            $this->tuitionExemptionRequestService->store($params);
            
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
