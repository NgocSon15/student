<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestModel extends Model
{
    use HasFactory;

    protected $table = 'requests';
    protected $fillable = [
        'user_id',
        'code',
        'type',
        'status',
        'fee',
        'processing_place',
        'receive_date'
    ];
    protected $cast = [
        'receive_date' => 'datetime'
    ];

    public function toArray()
    {
        $array = parent::toArray();
        return $array;
    }

    public function CertificateRequest()
    {
        return $this->hasOne(CertificateRequestModel::class, 'id', 'request_id');
    }
}
