<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PauseExamRequestModel extends Model
{
    use HasFactory;

    protected $table = 'pause_exam_requests';
    protected $fillable = [
        'request_id',
        'subject_name',
        'teacher_name',
        'exam_date',
        'reason',
        'files'
    ];

    protected $casts = [
        'exam_date' => 'datetime'
    ];

    public function toArray()
    {
        $array = parent::toArray();
        return $array;
    }
}
