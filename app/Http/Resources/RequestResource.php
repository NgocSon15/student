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
            case AppRequest::TYPE_NOT_FINISHED_SUBJECT:
                $requestInfo = $this->notFinishedSubjectRequest ?? null;
                break;
            case AppRequest::TYPE_TUITION_EXEMPTION:
                $requestInfo = $this->tuitionExemptionRequest ?? null;
                break;
            case AppRequest::TYPE_BUS_CARD:
                $requestInfo = $this->busCardRequest ?? null;
                break;
            case AppRequest::TYPE_HOUSE_RENTAL:
                $requestInfo = $this->houseRentalRequest ?? null;
                break;
            case AppRequest::TYPE_POINT_CONFIRM:
                $requestInfo = $this->pointConfirmRequest ?? null;
                break;
            case AppRequest::TYPE_INTRODUCE_STUDENT:
                $requestInfo = $this->introduceStudentRequest ?? null;
                break;
        }
        return [
            'id' => $this->id ?? null,
            'code' => $this->code,
            'user' => new UserResource($user),
            'type' => $this->requestType ? [
                'id' => $this->requestType->type,
                'name' => $this->requestType->name
            ] : null,
            'document_need' => in_array($this->type, AppRequest::DOCUMENT_NEED_REQUESTS) ? "Có" : "Không",
            'status' => $this->status ? [
                'id' => $this->status,
                'name' => AppRequest::STATUSES[$this->status]
            ] : null,
            'fee' => !empty($requestInfo) ? $requestInfo->fee : 0,
            'processing_place' => $this->processingPlace ? [
                'id' => $this->processingPlace->id,
                'name' => $this->processingPlace->name
            ] : null,
            'created_date' => $this->created_at->format('Y-m-d H:i:s'),
            'receive_date' => $this->receive_date ?? null,
            'expire_in' => $this->expire_in ?? AppRequest::DEFAULT_EXPIRE_DAY,
            'info' => !empty($requestInfo) ? new RequestInfoResource($requestInfo) : null,
        ];
    }
}
