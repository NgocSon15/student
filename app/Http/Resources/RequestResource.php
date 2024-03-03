<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Constants\AppRequest;

class RequestResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        $user = $request->user();
        switch ($this->type) {
            case AppRequest::TYPE_CERTIFICATE:
                $requestInfo = $this->certificateRequest ?? null;
                break;
            case AppRequest::TYPE_TRANSCRIPT:
                $requestInfo = $this->transcriptRequest ?? null;
                break;
            case AppRequest::TYPE_PAUSE_EXAM:
                $requestInfo = $this->pauseExamRequest ?? null;
                break;
            case AppRequest::TYPE_REVIEW_EXAM:
                $requestInfo = $this->reviewExamRequest ?? null;
                break;
            case AppRequest::TYPE_PAUSE_TUITION:
                $requestInfo = $this->pauseTuitionRequest ?? null;
                break;
            case AppRequest::TYPE_BORROW_FILE:
                $requestInfo = $this->borrowFileRequest ?? null;
                break;
            case AppRequest::TYPE_SOCIAL_ASSISTANCE:
                $requestInfo = $this->socialAssistanceRequest ?? null;
                break;
            case AppRequest::TYPE_BANK_LOAN:
                $requestInfo = $this->bankLoanRequest ?? null;
                break;
            case AppRequest::TYPE_STUDENT_CARD:
                $requestInfo = $this->studentCardRequest ?? null;
                break;
            case AppRequest::TYPE_TEMP_CERTIFICATE:
                $requestInfo = $this->tempCertificateRequest ?? null;
                break;
            case AppRequest::TYPE_TIME_LIMITED_ABSENCE:
                $requestInfo = $this->timeLimitedAbsenceRequest ?? null;
                break;
            case AppRequest::TYPE_CONTINUE_STUDY:
                $requestInfo = $this->continueStudyRequest ?? null;
                break;
            case AppRequest::TYPE_STOP_STUDY:
                $requestInfo = $this->stopStudyRequest ?? null;
                break;
            case AppRequest::TYPE_GOING_ABROAD:
                $requestInfo = $this->goingAbroadRequest ?? null;
                break;  
        }
        return [
            'id' => $this->id ?? null,
            'code' => $this->code,
            'user' => new UserResource($user),
            'type' => $this->type ? [
                'id' => $this->type,
                'name' => AppRequest::TYPES[$this->type]
            ] : null,
            'document_need' => in_array($this->type, AppRequest::DOCUMENT_NEED_REQUESTS) ? "Có" : "Không",
            'status' => $this->status ? [
                'id' => $this->status,
                'name' => AppRequest::STATUSES[$this->status]
            ] : null,
            'fee' => $this->fee ?? 0,
            'processing_place' => $this->processing_place ?? null,
            'created_date' => $this->created_at->format('Y-m-d H:i:s'),
            'receive_date' => $this->receive_date ?? null,
            'info' => !empty($requestInfo) ? new RequestInfoResource($requestInfo) : null,
        ];
    }
}
