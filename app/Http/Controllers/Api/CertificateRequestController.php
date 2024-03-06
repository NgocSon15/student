<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\CertificateRequestService;
use App\Services\RequestService;
use App\Http\Requests\Api\CertificateRequestRequest;
use App\Constants\AppRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponse;
use App\Http\Resources\RequestResource;

class CertificateRequestController extends ApiController
{
    use ApiResponse;
    /**
     * @var RequestService
     */
    private $requestService;
    /**
     * @var CertificateRequestService
     */
    private $certificateRequestService;

    public function __construct(
        RequestService $requestService,
        CertificateRequestService $certificateRequestService
    ) {
        $this->requestService = $requestService;
        $this->certificateRequestService = $certificateRequestService;
        parent::__construct();
    }

    /**
     * @param CertificateRequestRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CertificateRequestRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $request->user();
            $userId = $user->id;

            $newRequest = $this->requestService->createRequest($user, AppRequest::TYPE_CERTIFICATE);

            $params = $request->all();
            $params['request_id'] = $newRequest->id;

            $this->certificateRequestService->store($params);
            
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
