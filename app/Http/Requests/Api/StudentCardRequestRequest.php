<?php

namespace App\Http\Requests\Api;

use App\Models\SettingModel;

class StudentCardRequestRequest extends ApiRequest
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
            'files.*' => ['required']
        ];
    }

    public function messages()
    {
        return [];
    }
}
