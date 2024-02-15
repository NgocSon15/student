<?php

namespace App\Constants;

class BankLoanRequest
{
    const TYPE_ONE = 1;
    const TYPE_TWO = 2;
    const TYPE_THREE = 3;
    const TYPE_FOUR = 4;

    const TYPES = [
        self::TYPE_ONE => '960000',
        self::TYPE_TWO => '3000000',
        self::TYPE_THREE => '3500000',
        self::TYPE_FOUR => '4200000',
    ];
}