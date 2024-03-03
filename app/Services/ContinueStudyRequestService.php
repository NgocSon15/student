<?php

namespace App\Services;

use App\Models\ContinueStudyRequestModel;

class ContinueStudyRequestService
{
    public function store($params = [])
    {
        $item = ContinueStudyRequestModel::create($params);
        return $item;
    }
}