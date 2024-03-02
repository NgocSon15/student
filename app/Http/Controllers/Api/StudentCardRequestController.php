<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\StudentCardRequestService;
use App\Services\RequestService;
use App\Http\Requests\Api\StudentCardRequestRequest;
use App\Constants\AppRequest;
use Illuminate\Support\Facades\DB;
use App\Traits\ApiResponse;
use App\Http\Resources\RequestResource;
use Illuminate\Support\Facades\Storage;

class StudentCardRequestController extends ApiController
{
    use ApiResponse;
    /**
     * @var RequestService
     */
    private $requestService;
    /**
     * @var StudentCardRequestService
     */
    private $studentCardRequestService;

    public function __construct(
        RequestService $requestService,
        StudentCardRequestService $studentCardRequestService
    ) {
        $this->requestService = $requestService;
        $this->studentCardRequestService = $studentCardRequestService;
        parent::__construct();
    }

    /**
     * @param StudentCardRequestRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentCardRequestRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $request->user();
            $userId = $user->id;

            $newRequest = $this->requestService->store([
                'user_id' => $userId,
                'code' => '12345',
                'type' => AppRequest::TYPE_STUDENT_CARD,
                'status' => AppRequest::STATUS_NOT_RECEIVED,
                'receive_date' => now()
            ]);

            $params = $request->all();
            $params['request_id'] = $newRequest->id;

            $files = $request->file('files');
            $fileUrls = [];

            foreach ($files as $file) {
                // Generate a unique file name
                $fileName = time() . '_' . $file->getClientOriginalName();
            
                // Define the path within the S3 bucket
                $filePath = 'uploads/' . $userId . '/' . $fileName;
                
                // Upload file to S3 with the specified path
                Storage::disk('s3')->put($filePath, file_get_contents($file));

                // Make the file public
                Storage::disk('s3')->setVisibility($filePath, 'public');
                
                // Add the file URL to the array
                $fileUrls[] = $filePath;
            }

            $params['files'] = $fileUrls;

            $this->studentCardRequestService->store($params);
            
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
