<?php

namespace App\Repositories;

use App\Repositories\Eloquent\Repository;

class CertificateRequestRepository extends Repository
{
    public function model()
    {
        return 'App\Models\CertificateRequestModel';
    }
}