<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoingAbroadRequestModel extends Model
{
    use HasFactory;

    protected $table = 'going_abroad_requests';
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
