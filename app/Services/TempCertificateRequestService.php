<?php

namespace App\Services;

use App\Models\TempCertificateRequestModel;

class TempCertificateRequestService
{
    public function store($params = [])
    {
        $item = TempCertificateRequestModel::create($params);
        return $item;
    }
}