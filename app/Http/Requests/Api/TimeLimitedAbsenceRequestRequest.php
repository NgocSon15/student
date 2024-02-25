<?php

namespace App\Http\Requests\Api;

use App\Constants\TimeLimitedAbsenceRequest;
use App\Models\SettingModel;

class TimeLimitedAbsenceRequestRequest extends ApiRequest
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
            'reason' => ['nullable'],
            'files' => ['required', 'array'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'files.*' => ['required']
        ];
    }

    public function messages()
    {
        return [];
    }
}
