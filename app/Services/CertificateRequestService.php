<?php

namespace App\Services;

use App\Models\CertificateRequestModel;

class CertificateRequestService
{
    public function store($params = [])
    {
        $item = CertificateRequestModel::create($params);
        return $item;
    }
}