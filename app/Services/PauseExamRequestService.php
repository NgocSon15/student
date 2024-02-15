<?php

namespace App\Services;

use App\Models\PauseExamRequestModel;

class PauseExamRequestService
{
    public function store($params = [])
    {
        $item = PauseExamRequestModel::create($params);
        return $item;
    }
}