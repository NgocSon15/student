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
    const TYPE_BORROW_FILE = 6;
    const TYPE_SOCIAL_ASSISTANCE = 7;
    const TYPE_BANK_LOAN = 8;
    const TYPE_STUDENT_CARD = 9;
    const TYPE_TEMP_CERTIFICATE = 10;
    const TYPE_TIME_LIMITED_ABSENCE = 11;

    const TYPES = [
        self::TYPE_CERTIFICATE => 'certificate',
        self::TYPE_TRANSCRIPT => 'transcript',
        self::TYPE_PAUSE_EXAM => 'pause_exam',
        self::TYPE_REVIEW_EXAM => 'review_exam',
        self::TYPE_PAUSE_TUITION => 'pause_tuition',
        self::TYPE_BORROW_FILE => 'borrow_file',
        self::TYPE_SOCIAL_ASSISTANCE => 'social_assistance',
        self::TYPE_BANK_LOAN => 'bank_loan',
        self::TYPE_STUDENT_CARD => 'student_card',
        self::TYPE_TEMP_CERTIFICATE => 'temp_certificate',
        self::TYPE_TIME_LIMITED_ABSENCE => 'time_limited_absence',
    ];

    const STATUS_NOT_RECEIVED = 1;
    const STATUS_RECEIVED = 2;

    const STATUSES = [
        self::STATUS_NOT_RECEIVED => 'not_received',
        self::STATUS_RECEIVED => 'received',
    ];
}