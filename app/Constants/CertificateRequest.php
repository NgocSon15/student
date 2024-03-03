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
        self::TYPE_STUDENT => 'Chứng nhận Sinh viên /HV/NCS',
        self::TYPE_STUDENT_STRATEGIC => 'Sinh viên nhiệm vụ chiến lược',
        self::TYPE_SCHOLARSHIP => 'Học bổng',
        self::TYPE_LOST_CARD => 'Mất thẻ sinh viên',
        self::TYPE_TAX_DECLARATION => 'Kê khai thuế thu nhập',
        self::TYPE_PAUSE_MILITARY_SERVICE => 'Hoãn nghĩa vụ quân sự',
        self::TYPE_DORMITORY_REGISTER => 'Đăng ký ở KTX',
        self::TYPE_VISA => 'Xin Visa',
        self::TYPE_NOT_COMPLETE_COURSE => 'Chưa hoàn thành khóa học',
        self::TYPE_INTERNSHIP_INTRODUCE => 'Giấy giới thiệu thực tập',
        self::TYPE_OTHER => 'Loại khác',
    ];
}