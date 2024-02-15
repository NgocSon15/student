<?php

namespace App\Http\Requests\Api;

use App\Constants\ReviewExamRequest;
use App\Models\SettingModel;

class ReviewExamRequestRequest extends ApiRequest
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
            'semester' => ['required', 'integer'],
            'school_year' => ['required'],
            'reason' => ['nullable']
        ];
    }

    public function messages()
    {
        return [];
    }
}
