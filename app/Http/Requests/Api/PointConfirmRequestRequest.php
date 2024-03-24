<?php

namespace App\Http\Requests\Api;

use App\Constants\PointConfirmRequest;
use App\Models\SettingModel;

class PointConfirmRequestRequest extends ApiRequest
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
            'program_type' => ['required', 'integer', 'in:' . implode(',', array_keys(PointConfirmRequest::PROGRAM_TYPE))],
            'school_year' => ['required'],
            'reason' => ['nullable']
        ];
    }

    public function messages()
    {
        return [];
    }
}
