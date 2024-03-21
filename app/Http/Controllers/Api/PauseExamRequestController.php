<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\PauseExamRequestService;
use App\Services\RequestService;
use App\Http\Requests\Api\PauseExamRequestRequest;
use App\Constants\AppRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponse;
use App\Http\Resources\RequestResource;
use Illuminate\Support\Facades\Storage;

class PauseExamRequestController extends ApiController
{
    use ApiResponse;
    /**
     * @var RequestService
     */
    private $requestService;
    /**
     * @var PauseExamRequestService
     */
    private $pauseExamRequestService;

    public function __construct(
        RequestService $requestService,
        PauseExamRequestService $pauseExamRequestService
    ) {
        $this->requestService = $requestService;
        $this->pauseExamRequestService = $pauseExamRequestService;
        parent::__construct();
    }

    /**
     * @param PauseExamRequestRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PauseExamRequestRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $request->user();
            $userId = $user->id;

            $newRequest = $this->requestService->createRequest($user, AppRequest::TYPE_PAUSE_EXAM);

            $params = $request->all();
            $params['request_id'] = $newRequest->id;
            $params['fee'] = AppRequest::REQUEST_FEES[AppRequest::TYPE_PAUSE_EXAM];

            $files = $request->file('files');
            $fileUrls = [];

            foreach ($files as $file) {
                // Generate a unique file name
                $fileName = time() . '_' . $file->getClientOriginalName();

                // Define the path within the S3 bucket
                $filePath = 'uploads/' . $userId . '/' . $fileName;

                // Upload file to S3 with the specified path
                Storage::disk('s3')->put($filePath, file_get_contents($file), 'public');

                // Add the file URL to the array
                $fileUrls[] = Storage::disk('s3')->url($filePath);
            }

            $params['files'] = $fileUrls;

            $this->pauseExamRequestService->store($params);
            
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
