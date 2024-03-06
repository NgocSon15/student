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
    const TYPE_NOT_FINISHED_SUBJECT = 15;
    const TYPE_TUITION_EXEMPTION = 16;
    const TYPE_BUS_CARD = 17;

    const TYPES = [
        self::TYPE_CERTIFICATE => 'Giấy chứng nhận',
        self::TYPE_TRANSCRIPT => 'Cấp bảng điểm',
        self::TYPE_PAUSE_EXAM => 'Đề nghị Hoãn thi',
        self::TYPE_REVIEW_EXAM => 'Xem lại bài thi',
        self::TYPE_PAUSE_TUITION => 'Hoãn nộp học phí',
        self::TYPE_BORROW_FILE => 'Mượn hồ sơ',
        self::TYPE_SOCIAL_ASSISTANCE => 'XN trợ cấp xã hội',
        self::TYPE_BANK_LOAN => 'XN vay vốn ngân hàng',
        self::TYPE_STUDENT_CARD => 'Cấp lại thẻ sinh viên',
        self::TYPE_TEMP_CERTIFICATE => 'CN tốt nghiệp tạm thời',
        self::TYPE_TIME_LIMITED_ABSENCE => 'Nghỉ học có thời hạn',
        self::TYPE_CONTINUE_STUDY => 'Tiếp tục học',
        self::TYPE_STOP_STUDY => 'Xin thôi học',
        self::TYPE_GOING_ABROAD => 'Xác nhận đi nước ngoài',
        self::TYPE_NOT_FINISHED_SUBJECT => 'Chứng nhận còn nợ môn',
        self::TYPE_TUITION_EXEMPTION => 'XN miễn giảm HP',
        self::TYPE_BUS_CARD => 'Đề nghị làm vé xe buýt',
    ];

    const STATUS_CANCELED = 0;
    const STATUS_NOT_RECEIVED = 1;
    const STATUS_RECEIVED = 2;
    const STATUS_IN_PROGESS = 3;
    const STATUS_COMPLETED = 4;

    const STATUSES = [
        self::STATUS_CANCELED => 'Đã huỷ',
        self::STATUS_NOT_RECEIVED => 'Chưa nhận',
        self::STATUS_RECEIVED => 'Đã nhận',
        self::STATUS_IN_PROGESS => 'Đang xử lý',
        self::STATUS_COMPLETED => 'Đã hoàn thành',
    ];

    const DOCUMENT_NEED_REQUESTS = [
        self::TYPE_PAUSE_EXAM,
        self::TYPE_SOCIAL_ASSISTANCE,
        self::TYPE_TIME_LIMITED_ABSENCE,
        self::TYPE_STOP_STUDY,
        self::TYPE_GOING_ABROAD,
        self::TYPE_TUITION_EXEMPTION,
    ];

    const REQUEST_FEES = [
        self::TYPE_CERTIFICATE => '20000',
        self::TYPE_TRANSCRIPT => '20000',
        self::TYPE_PAUSE_EXAM => '20000',
        self::TYPE_REVIEW_EXAM => '20000',
        self::TYPE_PAUSE_TUITION => '20000',
        self::TYPE_BORROW_FILE => '20000',
        self::TYPE_SOCIAL_ASSISTANCE => '20000',
        self::TYPE_BANK_LOAN => '20000',
        self::TYPE_STUDENT_CARD => '20000',
        self::TYPE_TEMP_CERTIFICATE => '20000',
        self::TYPE_TIME_LIMITED_ABSENCE => '20000',
        self::TYPE_CONTINUE_STUDY => '20000',
        self::TYPE_STOP_STUDY => '20000',
        self::TYPE_GOING_ABROAD => '20000',
        self::TYPE_NOT_FINISHED_SUBJECT => '20000',
        self::TYPE_TUITION_EXEMPTION => '20000',
        self::TYPE_BUS_CARD => '20000',
    ];
}