<?php

namespace App\Constants;

class IntroduceStudentRequest
{
    const TYPE_FIRST_DEGREE = 1;
    const TYPE_SECOND_DEGREE = 2;

    const LEARNING_PROGRAM = [
        self::TYPE_FIRST_DEGREE => 'Bằng thứ nhất',
        self::TYPE_SECOND_DEGREE => 'Bằng kép/Bằng thứ 2',
    ];
}