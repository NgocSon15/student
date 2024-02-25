<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempCertificateRequestModel extends Model
{
    use HasFactory;

    protected $table = 'temporary_graduate_certificate_requests';
    protected $fillable = [
        'request_id',
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
