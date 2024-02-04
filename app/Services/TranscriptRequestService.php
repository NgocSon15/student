<?php

namespace App\Services;

use App\Models\TranscriptRequestModel;

class TranscriptRequestService
{
    public function store($params = [])
    {
        $item = TranscriptRequestModel::create($params);
        return $item;
    }
}