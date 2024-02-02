<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificateRequestModel extends Model
{
    use HasFactory;

    protected $table = 'certificate_requests';
    protected $fillable = [
        'request_id',
        'certificate_type',
        'number_of_copies_vi',
        'number_of_copies_en',
        'reason'
    ];

    public function toArray()
    {
        $array = parent::toArray();
        return $array;
    }
}
