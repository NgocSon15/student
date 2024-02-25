<?php

namespace App\Services;

use App\Models\TimeLimitedAbsenceRequestModel;

class TimeLimitedAbsenceRequestService
{
    public function store($params = [])
    {
        $item = TimeLimitedAbsenceRequestModel::create($params);
        return $item;
    }
}