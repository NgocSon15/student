<?php

namespace App\Services;

use App\Models\IntroduceStudentRequestModel;

class IntroduceStudentRequestService
{
    public function store($params = [])
    {
        $item = IntroduceStudentRequestModel::create($params);
        return $item;
    }
}