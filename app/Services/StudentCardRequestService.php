<?php

namespace App\Services;

use App\Models\StudentCardRequestModel;

class StudentCardRequestService
{
    public function store($params = [])
    {
        $item = StudentCardRequestModel::create($params);
        return $item;
    }
}