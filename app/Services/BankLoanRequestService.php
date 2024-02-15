<?php

namespace App\Services;

use App\Models\BankLoanRequestModel;

class BankLoanRequestService
{
    public function store($params = [])
    {
        $item = BankLoanRequestModel::create($params);
        return $item;
    }
}