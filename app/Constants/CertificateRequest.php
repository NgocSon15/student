<?php

namespace App\Constants;

class CertificateRequest
{
    const TYPE_STUDENT = 1;
    const TYPE_STUDENT_STRATEGIC = 2;
    const TYPE_SCHOLARSHIP = 3;
    const TYPE_LOST_CARD = 4;
    const TYPE_TAX_DECLARATION = 5;
    const TYPE_PAUSE_MILITARY_SERVICE = 6;
    const TYPE_DORMITORY_REGISTER = 7;
    const TYPE_VISA = 8;
    const TYPE_NOT_COMPLETE_COURSE = 9;
    const TYPE_INTERNSHIP_INTRODUCE = 10;
    const TYPE_OTHER = 11;

    const TYPES = [
        self::TYPE_STUDENT => 'student',
        self::TYPE_STUDENT_STRATEGIC => 'strategic tasks student',
        self::TYPE_SCHOLARSHIP => 'scholarship',
        self::TYPE_LOST_CARD => 'lost student card',
        self::TYPE_TAX_DECLARATION => 'income tax declaration',
        self::TYPE_PAUSE_MILITARY_SERVICE => 'pause military service',
        self::TYPE_DORMITORY_REGISTER => 'dormitory register',
        self::TYPE_VISA => 'visa',
        self::TYPE_NOT_COMPLETE_COURSE => 'not complete course',
        self::TYPE_INTERNSHIP_INTRODUCE => 'internship introduce',
        self::TYPE_OTHER => 'other',
    ];
}