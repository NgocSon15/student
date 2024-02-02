<?php

namespace App\Services;

use App\Models\RequestModel;

class RequestService
{
    public function store($params = [])
    {
        $item = RequestModel::create($params);
        return $item;
    }
}