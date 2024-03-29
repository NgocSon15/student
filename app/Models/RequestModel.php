<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestModel extends Model
{
    use HasFactory;

    protected $table = 'requests';
    protected $fillable = [
        'user_id',
        'code',
        'type',
        'status',
        'processing_place',
        'receive_date',
        'expire_in',
    ];
    protected $cast = [
        'receive_date' => 'datetime'
    ];

    public function toArray()
    {
        $array = parent::toArray();
        return $array;
    }

    public function certificateRequest()
    {
        return $this->hasOne(CertificateRequestModel::class, 'request_id', 'id');
    }

    public function transcriptRequest()
    {
        return $this->hasOne(TranscriptRequestModel::class, 'request_id', 'id');
    }

    public function pauseExamRequest()
    {
        return $this->hasOne(PauseExamRequestModel::class, 'request_id', 'id');
    }

    public function reviewExamRequest()
    {
        return $this->hasOne(ReviewExamRequestModel::class, 'request_id', 'id');
    }

    public function pauseTuitionRequest()
    {
        return $this->hasOne(PauseTuitionRequestModel::class, 'request_id', 'id');
    }

    public function borrowFileRequest()
    {
        return $this->hasOne(BorrowFileRequestModel::class, 'request_id', 'id');
    }

    public function socialAssistanceRequest()
    {
        return $this->hasOne(SocialAssistanceRequestModel::class, 'request_id', 'id');
    }

    public function bankLoanRequest()
    {
        return $this->hasOne(BankLoanRequestModel::class, 'request_id', 'id');
    }

    public function studentCardRequest()
    {
        return $this->hasOne(StudentCardRequestModel::class, 'request_id', 'id');
    }

    public function tempCertificateRequest()
    {
        return $this->hasOne(TempCertificateRequestModel::class, 'request_id', 'id');
    }

    public function timeLimitedAbsenceRequest()
    {
        return $this->hasOne(TimeLimitedAbsenceRequestModel::class, 'request_id', 'id');
    }

    public function continueStudyRequest()
    {
        return $this->hasOne(ContinueStudyRequestModel::class, 'request_id', 'id');
    }

    public function stopStudyRequest()
    {
        return $this->hasOne(StopStudyRequestModel::class, 'request_id', 'id');
    }

    public function goingAbroadRequest()
    {
        return $this->hasOne(GoingAbroadRequestModel::class, 'request_id', 'id');
    }

    public function notFinishedSubjectRequest()
    {
        return $this->hasOne(NotFinishedSubjectRequestModel::class, 'request_id', 'id');
    }

    public function tuitionExemptionRequest()
    {
        return $this->hasOne(TuitionExemptionRequestModel::class, 'request_id', 'id');
    }

    public function busCardRequest()
    {
        return $this->hasOne(BusCardRequestModel::class, 'request_id', 'id');
    }

    public function houseRentalRequest()
    {
        return $this->hasOne(HouseRentalRequestModel::class, 'request_id', 'id');
    }

    public function pointConfirmRequest()
    {
        return $this->hasOne(PointConfirmRequestModel::class, 'request_id', 'id');
    }

    public function introduceStudentRequest()
    {
        return $this->hasOne(IntroduceStudentRequestModel::class, 'request_id', 'id');
    }

    public function processingPlace()
    {
        return $this->belongsTo(ProcessingPlaceModel::class, 'processing_place', 'id');
    }

    public function requestType()
    {
        return $this->belongsTo(RequestTypeModel::class, 'type', 'type');
    }
}
