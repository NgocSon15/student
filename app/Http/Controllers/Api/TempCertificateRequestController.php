<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\TempCertificateRequestService;
use App\Services\RequestService;
use App\Http\Requests\Api\TempCertificateRequestRequest;
use App\Constants\AppRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponse;
use App\Http\Resources\RequestResource;

class TempCertificateRequestController extends ApiController
{
    use ApiResponse;
    /**
     * @var RequestService
     */
    private $requestService;
    /**
     * @var TempCertificateRequestService
     */
    private $tempCertificateRequestService;

    public function __construct(
        RequestService $requestService,
        TempCertificateRequestService $tempCertificateRequestService
    ) {
        $this->requestService = $requestService;
        $this->tempCertificateRequestService = $tempCertificateRequestService;
        parent::__construct();
    }

    /**
     * @param TempCertificateRequestRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TempCertificateRequestRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $request->user();
            $userId = $user->id;

            $newRequest = $this->requestService->createRequest($user, AppRequest::TYPE_TEMP_CERTIFICATE);;

            $params = $request->all();
            $params['request_id'] = $newRequest->id;

            $this->tempCertificateRequestService->store($params);
            
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
