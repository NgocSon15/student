<?php

namespace App\Http\Controllers\Api;

use App\Services\TuitionExemptionRequestService;
use App\Services\RequestService;
use App\Http\Requests\Api\TuitionExemptionRequestRequest;
use App\Constants\AppRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponse;
use App\Http\Resources\RequestResource;
use Illuminate\Support\Facades\Storage;

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
            $params['fee'] = AppRequest::REQUEST_FEES[AppRequest::TYPE_TUITION_EXEMPTION];

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
