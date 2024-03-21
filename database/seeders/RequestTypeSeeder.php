<?php

namespace Database\Seeders;

use App\Constants\AppRequest;
use Illuminate\Database\Seeder;

class RequestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\RequestTypeModel::create(
            [
                'type' => 1,
                'code' => 'CERTIFICATE',
                'name' => 'Giấy chứng nhận',
                'table_name' => 'certificate_requests',
                'status' => AppRequest::ACTIVE,
            ],
        );
        \App\Models\RequestTypeModel::create(
            [
                'type' => 2,
                'code' => 'TRANSCRIPT',
                'name' => 'Cấp bảng điểm',
                'table_name' => 'transcript_requests',
                'status' => AppRequest::ACTIVE,
            ],
        );
        \App\Models\RequestTypeModel::create(
            [
                'type' => 3,
                'code' => 'PAUSE_EXAM',
                'name' => 'Đề nghị Hoãn thi',
                'table_name' => 'pause_exam_requests',
                'status' => AppRequest::ACTIVE,
            ],
        );
        \App\Models\RequestTypeModel::create(
            [
                'type' => 4,
                'code' => 'REVIEW_EXAM',
                'name' => 'Xem lại bài thi',
                'table_name' => 'review_exam_requests',
                'status' => AppRequest::ACTIVE,
            ],
        );
        \App\Models\RequestTypeModel::create(
            [
                'type' => 5,
                'code' => 'PAUSE_TUITION',
                'name' => 'Hoãn nộp học phí',
                'table_name' => 'pause_tuition_requests',
                'status' => AppRequest::ACTIVE,
            ],
        );
        \App\Models\RequestTypeModel::create(
            [
                'type' => 6,
                'code' => 'BORROW_FILE',
                'name' => 'Mượn hồ sơ',
                'table_name' => 'borrow_file_requests',
                'status' => AppRequest::ACTIVE,
            ],
        );
        \App\Models\RequestTypeModel::create(
            [
                'type' => 7,
                'code' => 'SOCIAL_ASSISTANCE',
                'name' => 'XN trợ cấp xã hội',
                'table_name' => 'social_assistance_requests',
                'status' => AppRequest::ACTIVE,
            ],
        );
        \App\Models\RequestTypeModel::create(
            [
                'type' => 8,
                'code' => 'BANK_LOAN',
                'name' => 'XN vay vốn ngân hàng',
                'table_name' => 'bank_loan_requests',
                'status' => AppRequest::ACTIVE,
            ],
        );
        \App\Models\RequestTypeModel::create(
            [
                'type' => 9,
                'code' => 'STUDENT_CARD',
                'name' => 'Cấp lại thẻ sinh viên',
                'table_name' => 'reissue_student_card_requests',
                'status' => AppRequest::ACTIVE,
            ],
        );
        \App\Models\RequestTypeModel::create(
            [
                'type' => 10,
                'code' => 'TEMP_CERTIFICATE',
                'name' => 'CN tốt nghiệp tạm thời',
                'table_name' => 'temporary_graduate_certificate_requests',
                'status' => AppRequest::ACTIVE,
            ],
        );
        \App\Models\RequestTypeModel::create(
            [
                'type' => 11,
                'code' => 'TIME_LIMITED_ABSENCE',
                'name' => 'Nghỉ học có thời hạn',
                'table_name' => 'time_limited_absence_requests',
                'status' => AppRequest::ACTIVE,
            ],
        );
        \App\Models\RequestTypeModel::create(
            [
                'type' => 12,
                'code' => 'CONTINUE_STUDY',
                'name' => 'Tiếp tục học',
                'table_name' => 'continue_study_requests',
                'status' => AppRequest::ACTIVE,
            ],
        );
        \App\Models\RequestTypeModel::create(
            [
                'type' => 13,
                'code' => 'STOP_STUDY',
                'name' => 'Xin thôi học',
                'table_name' => 'stop_study_requests',
                'status' => AppRequest::ACTIVE,
            ],
        );
        \App\Models\RequestTypeModel::create(
            [
                'type' => 14,
                'code' => 'GOING_ABROAD',
                'name' => 'Xác nhận đi nước ngoài',
                'table_name' => 'going_abroad_requests',
                'status' => AppRequest::ACTIVE,
            ],
        );
        \App\Models\RequestTypeModel::create(
            [
                'type' => 15,
                'code' => 'NOT_FINISHED_SUBJECT',
                'name' => 'Chứng nhận còn nợ môn',
                'table_name' => 'not_finished_subject_requests',
                'status' => AppRequest::ACTIVE,
            ],
        );
        \App\Models\RequestTypeModel::create(
            [
                'type' => 16,
                'code' => 'TUITION_EXEMPTION',
                'name' => 'XN miễn giảm HP',
                'table_name' => 'tuition_exemption_requests',
                'status' => AppRequest::ACTIVE,
            ],
        );
        \App\Models\RequestTypeModel::create(
            [
                'type' => 17,
                'code' => 'BUS_CARD',
                'name' => 'Đề nghị làm vé xe buýt',
                'table_name' => 'bus_card_requests',
                'status' => AppRequest::ACTIVE,
            ],
        );
        \App\Models\RequestTypeModel::create(
            [
                'type' => 18,
                'code' => 'HOUSE_RENTAL',
                'name' => 'Đề nghị thuê nhà ở',
                'table_name' => 'house_rental_requests',
                'status' => AppRequest::ACTIVE,
            ],
        );
        \App\Models\RequestTypeModel::create(
            [
                'type' => 19,
                'code' => 'CONFIRM_POINT',
                'name' => 'XN điểm rèn luyện',
                'table_name' => 'training_point_confirm_requests',
                'status' => AppRequest::ACTIVE,
            ],
        );
        \App\Models\RequestTypeModel::create(
            [
                'type' => 20,
                'code' => 'INTRODUCE_STUDENT',
                'name' => 'Giới thiệu sinh viên',
                'table_name' => 'introduce_student_requests',
                'status' => AppRequest::ACTIVE,
            ],
        );
    }
}
