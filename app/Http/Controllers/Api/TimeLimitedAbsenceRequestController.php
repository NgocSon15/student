<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\TimeLimitedAbsenceRequestService;
use App\Services\RequestService;
use App\Http\Requests\Api\TimeLimitedAbsenceRequestRequest;
use App\Constants\AppRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponse;
use App\Http\Resources\RequestResource;

class TimeLimitedAbsenceRequestController extends ApiController
{
    use ApiResponse;
    /**
     * @var RequestService
     */
    private $requestService;
    /**
     * @var TimeLimitedAbsenceRequestService
     */
    private $timeLimitedAbsenceRequestService;

    public function __construct(
        RequestService $requestService,
        TimeLimitedAbsenceRequestService $timeLimitedAbsenceRequestService
    ) {
        $this->requestService = $requestService;
        $this->timeLimitedAbsenceRequestService = $timeLimitedAbsenceRequestService;
        parent::__construct();
    }

    /**
     * @param TimeLimitedAbsenceRequestRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimeLimitedAbsenceRequestRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $request->user();
            $userId = $user->id;

            $newRequest = $this->requestService->store([
                'user_id' => $userId,
                'code' => '12345',
                'type' => AppRequest::TYPE_TIME_LIMITED_ABSENCE,
                'status' => AppRequest::STATUS_NOT_RECEIVED,
                'receive_date' => now()
            ]);

            $params = $request->all();
            $params['request_id'] = $newRequest->id;

            $this->timeLimitedAbsenceRequestService->store($params);
            
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
