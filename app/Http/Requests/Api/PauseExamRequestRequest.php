<?php

namespace App\Http\Requests\Api;

use App\Constants\PauseExamRequest;
use App\Models\SettingModel;

class PauseExamRequestRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'subject_name' => ['required'],
            'teacher_name' => ['required'],
            'exam_date' => ['required'],
            'reason' => ['nullable'],
            'files' => ['nullable']
        ];
    }

    public function messages()
    {
        return [];
    }
}
