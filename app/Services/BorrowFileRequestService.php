<?php

namespace App\Services;

use App\Models\BorrowFileRequestModel;

class BorrowFileRequestService
{
    public function store($params = [])
    {
        $item = BorrowFileRequestModel::create($params);
        return $item;
    }
}