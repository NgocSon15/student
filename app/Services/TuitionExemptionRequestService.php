<?php

namespace App\Services;

use App\Models\TuitionExemptionRequestModel;

class TuitionExemptionRequestService
{
    public function store($params = [])
    {
        $item = TuitionExemptionRequestModel::create($params);
        return $item;
    }
}