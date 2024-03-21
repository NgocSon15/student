<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StopStudyRequestModel extends Model
{
    use HasFactory;

    protected $table = 'stop_study_requests';
    protected $fillable = [
        'request_id',
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
