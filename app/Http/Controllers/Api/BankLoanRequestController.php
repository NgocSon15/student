<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\BankLoanRequestService;
use App\Services\RequestService;
use App\Http\Requests\Api\BankLoanRequestRequest;
use App\Constants\AppRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponse;
use App\Http\Resources\RequestResource;

class BankLoanRequestController extends ApiController
{
    use ApiResponse;
    /**
     * @var RequestService
     */
    private $requestService;
    /**
     * @var BankLoanRequestService
     */
    private $bankLoanRequestService;

    public function __construct(
        RequestService $requestService,
        BankLoanRequestService $bankLoanRequestService
    ) {
        $this->requestService = $requestService;
        $this->bankLoanRequestService = $bankLoanRequestService;
        parent::__construct();
    }

    /**
     * @param BankLoanRequestRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankLoanRequestRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $request->user();
            $userId = $user->id;

            $newRequest = $this->requestService->createRequest($user, AppRequest::TYPE_BANK_LOAN);

            $params = $request->all();
            $params['request_id'] = $newRequest->id;

            $this->bankLoanRequestService->store($params);
            
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
