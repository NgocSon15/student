<?php

namespace App\Http\Requests\Api;

use App\Constants\IntroduceStudentRequest;
use App\Models\SettingModel;

class IntroduceStudentRequestRequest extends ApiRequest
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
            'learning_program' => ['required', 'integer', 'in:' . implode(',', array_keys(IntroduceStudentRequest::LEARNING_PROGRAM))],
            'practice_place' => ['required'],
            'reason' => ['nullable'],
            'files' => ['required', 'array'],
            'files.*' => ['required', 'file']
        ];
    }

    public function messages()
    {
        return [];
    }
}
