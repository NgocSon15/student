<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCardRequestModel extends Model
{
    use HasFactory;

    protected $table = 'reissue_student_card_requests';
    protected $fillable = [
        'request_id',
        'reason',
        'files'
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
