<?php

namespace App\Services;

use App\Models\GoingAbroadRequestModel;

class GoingAbroadRequestService
{
    public function store($params = [])
    {
        $item = GoingAbroadRequestModel::create($params);
        return $item;
    }
}