<?php

namespace App\Services;

use App\Models\StopStudyRequestModel;

class StopStudyRequestService
{
    public function store($params = [])
    {
        $item = StopStudyRequestModel::create($params);
        return $item;
    }
}