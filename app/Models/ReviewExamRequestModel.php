<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewExamRequestModel extends Model
{
    use HasFactory;

    protected $table = 'review_exam_requests';
    protected $fillable = [
        'request_id',
        'subject_name',
        'semester',
        'school_year',
        'reason',
        'fee',
    ];

    public function toArray()
    {
        $array = parent::toArray();
        return $array;
    }
}
