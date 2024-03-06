<?php

namespace App\Services;

use App\Models\NotFinishedSubjectRequestModel;

class NotFinishedSubjectRequestService
{
    public function store($params = [])
    {
        $item = NotFinishedSubjectRequestModel::create($params);
        return $item;
    }
}