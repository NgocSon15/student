<?php

namespace App\Services;

use App\Models\HouseRentalRequestModel;

class HouseRentalRequestService
{
    public function store($params = [])
    {
        $item = HouseRentalRequestModel::create($params);
        return $item;
    }
}