<?php

namespace App\Constants;

class TranscriptRequest
{
    const TYPE_FACTOR_FOUR = 1;
    const TYPE_FACTOR_TEN = 2;

    const TYPES = [
        self::TYPE_FACTOR_FOUR => 'factor four',
        self::TYPE_FACTOR_TEN => 'factor ten',
    ];
}