<?php

namespace App\Constants;

class AppRequest
{
    const LIMIT = 15;

    const TYPE_CERTIFICATE = 1;
    const TYPE_TRANSCRIPT = 2;
    const TYPE_PAUSE_EXAM = 3;
    const TYPE_REVIEW_EXAM = 4;
    const TYPE_PAUSE_TUITION = 5;

    const TYPES = [
        self::TYPE_CERTIFICATE => 'certificate',
        self::TYPE_TRANSCRIPT => 'transcript',
        self::TYPE_PAUSE_EXAM => 'pause_exam',
        self::TYPE_REVIEW_EXAM => 'review_exam',
        self::TYPE_PAUSE_TUITION => 'pause_tuition',
    ];

    const STATUS_NOT_RECEIVED = 1;
    const STATUS_RECEIVED = 2;

    const STATUSES = [
        self::STATUS_NOT_RECEIVED => 'not_received',
        self::STATUS_RECEIVED => 'received',
    ];
}