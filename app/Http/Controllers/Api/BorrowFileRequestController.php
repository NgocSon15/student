<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\BorrowFileRequestService;
use App\Services\RequestService;
use App\Http\Requests\Api\BorrowFileRequestRequest;
use App\Constants\AppRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponse;
use App\Http\Resources\RequestResource;

class BorrowFileRequestController extends ApiController
{
    use ApiResponse;
    /**
     * @var RequestService
     */
    private $requestService;
    /**
     * @var BorrowFileRequestService
     */
    private $borrowFileRequestService;

    public function __construct(
        RequestService $requestService,
        BorrowFileRequestService $borrowFileRequestService
    ) {
        $this->requestService = $requestService;
        $this->borrowFileRequestService = $borrowFileRequestService;
        parent::__construct();
    }

    /**
     * @param BorrowFileRequestRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BorrowFileRequestRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $request->user();
            $userId = $user->id;

            $newRequest = $this->requestService->store([
                'user_id' => $userId,
                'code' => '12345',
                'type' => AppRequest::TYPE_BORROW_FILE,
                'status' => AppRequest::STATUS_NOT_RECEIVED,
                'receive_date' => now()
            ]);

            $params = $request->all();
            $params['request_id'] = $newRequest->id;

            $this->borrowFileRequestService->store($params);
            
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
