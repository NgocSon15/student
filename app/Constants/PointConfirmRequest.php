<?php

namespace App\Constants;

class PointConfirmRequest
{
    const TYPE_FIRST_DEGREE = 1;
    const TYPE_SECOND_DEGREE = 2;

    const PROGRAM_TYPE = [
        self::TYPE_FIRST_DEGREE => 'Bằng thứ nhất',
        self::TYPE_SECOND_DEGREE => 'Bằng kép/Bằng thứ 2',
    ];
}