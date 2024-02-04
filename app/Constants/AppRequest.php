<?php

namespace App\Constants;

class AppRequest
{
    const LIMIT = 15;

    const TYPE_CERTIFICATE = 1;
    const TYPE_TRANSCRIPT = 2;

    const TYPES = [
        self::TYPE_CERTIFICATE => 'certificate',
        self::TYPE_TRANSCRIPT => 'transcript',
    ];

    const STATUS_NOT_RECEIVED = 1;
    const STATUS_RECEIVED = 2;

    const STATUSES = [
        self::STATUS_NOT_RECEIVED => 'not_received',
        self::STATUS_RECEIVED => 'received',
    ];
}