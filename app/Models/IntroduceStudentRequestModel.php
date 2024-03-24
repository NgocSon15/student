<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntroduceStudentRequestModel extends Model
{
    use HasFactory;

    protected $table = 'introduce_student_requests';
    protected $fillable = [
        'request_id',
        'learning_program',
        'practice_place',
        'reason',
        'files',
        'fee',
    ];

    protected $casts = [
        'files' => 'array'
    ];

    public function toArray()
    {
        $array = parent::toArray();
        return $array;
    }
}
