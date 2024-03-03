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
    const TYPE_CONTINUE_STUDY = 12;
    const TYPE_STOP_STUDY = 13;
    const TYPE_GOING_ABROAD = 14;

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
        self::TYPE_CONTINUE_STUDY => 'continue_study',
        self::TYPE_STOP_STUDY => 'stop_study',
        self::TYPE_GOING_ABROAD => 'going_abroad',
    ];

    const STATUS_NOT_RECEIVED = 1;
    const STATUS_RECEIVED = 2;

    const STATUSES = [
        self::STATUS_NOT_RECEIVED => 'not_received',
        self::STATUS_RECEIVED => 'received',
    ];
}