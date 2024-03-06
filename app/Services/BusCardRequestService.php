<?php

namespace App\Services;

use App\Models\BusCardRequestModel;

class BusCardRequestService
{
    public function store($params = [])
    {
        $item = BusCardRequestModel::create($params);
        return $item;
    }
}