<?php

namespace App\Services;

use App\Models\SocialAssistanceRequestModel;

class SocialAssistanceRequestService
{
    public function store($params = [])
    {
        $item = SocialAssistanceRequestModel::create($params);
        return $item;
    }
}