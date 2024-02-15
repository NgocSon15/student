<?php

namespace App\Constants;

class BorrowFileRequest
{
    const TYPE_ORIGINAL_TRANSCRIPT = 1;
    const TYPE_HIGH_SCHOOL_DIPLOMA = 2;
    const TYPE_APPOINTMENT = 3;

    const TYPES = [
        self::TYPE_ORIGINAL_TRANSCRIPT => 'original transcript',
        self::TYPE_HIGH_SCHOOL_DIPLOMA => 'high school diploma',
        self::TYPE_APPOINTMENT => 'appointment',
    ];
}