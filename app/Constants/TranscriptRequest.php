<?php

namespace App\Constants;

class TranscriptRequest
{
    const TYPE_FACTOR_FOUR = 1;
    const TYPE_FACTOR_TEN = 2;

    const TYPES = [
        self::TYPE_FACTOR_FOUR => 'Chữ hệ số 4',
        self::TYPE_FACTOR_TEN => 'Số hệ số 10',
    ];
}