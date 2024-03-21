<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeLimitedAbsenceRequestModel extends Model
{
    use HasFactory;

    protected $table = 'time_limited_absence_requests';
    protected $fillable = [
        'request_id',
        'start_date',
        'end_date',
        'reason',
        'files',
        'fee',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'files' => 'array'
    ];

    public function toArray()
    {
        $array = parent::toArray();
        return $array;
    }
}
