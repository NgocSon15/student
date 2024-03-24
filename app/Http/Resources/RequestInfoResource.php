<?php

namespace App\Http\Resources;

use App\Constants\BankLoanRequest;
use App\Constants\BorrowFileRequest;
use App\Constants\BusCardRequest;
use App\Constants\CertificateRequest;
use App\Constants\IntroduceStudentRequest;
use App\Constants\PointConfirmRequest;
use App\Constants\TranscriptRequest;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestInfoResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {
        $returnData = [
            'id' => $this->id ?? null,
            'request_id' => $this->request_id ?? null,
        ];
        if (isset($this->reason) && $this->reason !== null) {
            $returnData['reason'] = $this->reason;
        }
        if (isset($this->tuition_type) && $this->tuition_type !== null) {
            $returnData['month_fee'] = BankLoanRequest::TYPES[$this->tuition_type];
        }
        if (isset($this->file_types) && $this->file_types !== null) {
            $documents = [];
            foreach ($this->file_types as $type) {
                $documents[] = BorrowFileRequest::TYPES[$type];
            }
            $returnData['documents'] = $documents;
        }
        if (isset($this->other_file) && $this->other_file !== null) {
            $returnData['other_document'] = $this->other_file;
        }
        if (isset($this->start_date) && $this->start_date !== null) {
            $returnData['start_date'] = $this->start_date->format('Y-m-d H:i:s');
        }
        if (isset($this->end_date) && $this->end_date !== null) {
            $returnData['end_date'] = $this->end_date->format('Y-m-d H:i:s');
        }
        if (isset($this->certificate_type) && $this->certificate_type !== null) {
            $returnData['certificate_type'] = CertificateRequest::TYPES[$this->certificate_type];
        }
        if ((isset($this->number_of_copies_vi) && $this->number_of_copies_vi !== null) || (isset($this->number_of_copies_en) && $this->number_of_copies_en !== null)) {
            $returnData['quantity_viet'] = $this->number_of_copies_vi ?? 0;
            $returnData['quantity_eng'] = $this->number_of_copies_en ?? 0;
        }
        if (isset($this->files) && $this->files !== null) {
            $returnData['files'] = $this->files ?? [];
        }
        if (isset($this->subject_name) && $this->subject_name !== null) {
            $returnData['subject'] = $this->subject_name ?? null;
        }
        if (isset($this->teacher_name) && $this->teacher_name !== null) {
            $returnData['lecturer'] = $this->teacher_name ?? null;
        }
        if (isset($this->exam_date) && $this->exam_date !== null) {
            $returnData['exam_date'] = $this->exam_date->format('Y-m-d H:i:s');
        }
        if (isset($this->semester) && $this->semester !== null) {
            $returnData['semester'] = $this->semester ?? null;
        }
        if (isset($this->school_year) && $this->school_year !== null) {
            $returnData['year'] = $this->school_year ?? null;
        }
        if (isset($this->is_all_semesters) && $this->is_all_semesters !== null) {
            $returnData['semester_type'] = $this->is_all_semesters ? "Tất cả" : "Từng kỳ";
        }
        if (isset($this->semesters) && $this->semesters !== null) {
            $returnData['semester_number'] = $this->semesters;
        }
        if (isset($this->transcript_type) && $this->transcript_type !== null) {
            $returnData['transcript_type'] = TranscriptRequest::TYPES[$this->transcript_type];
        }
        if (isset($this->bus_number) && $this->bus_number !== null) {
            $returnData['bus_number'] = $this->bus_number ?? null;
        }
        if (isset($this->interline_bus_type) && $this->interline_bus_type !== null) {
            $returnData['interline_bus_type'] = BusCardRequest::INTERLINE_BUS_TYPE[$this->interline_bus_type];
        }
        if (isset($this->address) && $this->address !== null) {
            $returnData['student_address'] = $this->address ?? null;
        }
        if (isset($this->phone_number) && $this->phone_number !== null) {
            $returnData['phone_contact'] = $this->phone_number ?? null;
        }
        if (isset($this->process_place) && $this->process_place !== null) {
            $returnData['receiving_place'] = $this->process_place ?? null;
        }
        if (isset($this->email) && $this->email !== null) {
            $returnData['email'] = $this->email ?? null;
        }
        if (isset($this->contact_method) && $this->contact_method !== null) {
            $returnData['contact_method'] = $this->contact_method ?? null;
        }
        if (isset($this->priority) && $this->priority !== null) {
            $returnData['priority'] = $this->priority ?? null;
        }
        if (isset($this->name) && $this->name !== null) {
            $returnData['name'] = $this->name ?? null;
        }
        if (isset($this->program_type) && $this->program_type !== null) {
            $returnData['program_type'] = PointConfirmRequest::PROGRAM_TYPE[$this->program_type];
        }
        if (isset($this->learning_program) && $this->learning_program !== null) {
            $returnData['learning_program'] = IntroduceStudentRequest::LEARNING_PROGRAM[$this->learning_program];
        }
        if (isset($this->practice_place) && $this->practice_place !== null) {
            $returnData['practice_place'] = $this->practice_place ?? null;
        }
        return $returnData;
    }
}
