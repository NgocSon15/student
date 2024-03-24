<?php

namespace App\Services;

use App\Models\PointConfirmRequestModel;

class PointConfirmRequestService
{
    public function store($params = [])
    {
        $item = PointConfirmRequestModel::create($params);
        return $item;
    }
}