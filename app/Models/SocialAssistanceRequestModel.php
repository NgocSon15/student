<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialAssistanceRequestModel extends Model
{
    use HasFactory;

    protected $table = 'social_assistance_requests';
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
