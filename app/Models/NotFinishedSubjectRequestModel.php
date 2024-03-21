<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotFinishedSubjectRequestModel extends Model
{
    use HasFactory;

    protected $table = 'not_finished_subject_requests';
    protected $fillable = [
        'request_id',
        'number_of_copies_vi',
        'number_of_copies_en',
        'reason',
        'fee',
    ];

    public function toArray()
    {
        $array = parent::toArray();
        return $array;
    }
}
