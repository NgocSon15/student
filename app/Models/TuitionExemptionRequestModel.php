<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TuitionExemptionRequestModel extends Model
{
    use HasFactory;

    protected $table = 'tuition_exemption_requests';
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
