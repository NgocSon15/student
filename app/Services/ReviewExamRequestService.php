<?php

namespace App\Services;

use App\Models\ReviewExamRequestModel;

class ReviewExamRequestService
{
    public function store($params = [])
    {
        $item = ReviewExamRequestModel::create($params);
        return $item;
    }
}