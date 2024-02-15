<?php

namespace App\Services;

use App\Models\PauseTuitionRequestModel;

class PauseTuitionRequestService
{
    public function store($params = [])
    {
        $item = PauseTuitionRequestModel::create($params);
        return $item;
    }
}