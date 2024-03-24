<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointConfirmRequestModel extends Model
{
    use HasFactory;

    protected $table = 'training_point_confirm_requests';
    protected $fillable = [
        'request_id',
        'program_type',
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
