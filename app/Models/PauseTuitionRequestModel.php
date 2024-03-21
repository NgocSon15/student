<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PauseTuitionRequestModel extends Model
{
    use HasFactory;

    protected $table = 'pause_tuition_payment_requests';
    protected $fillable = [
        'request_id',
        'semester',
        'school_year',
        'end_date',
        'reason',
        'fee',
    ];

    protected $casts = [
        'end_date' => 'datetime'
    ];

    public function toArray()
    {
        $array = parent::toArray();
        return $array;
    }
}
