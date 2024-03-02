<?php

namespace App\Http\Requests\Api;

use App\Constants\SocialAssistanceRequest;
use App\Models\SettingModel;

class SocialAssistanceRequestRequest extends ApiRequest
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
            'files.*' => ['required', 'file']
        ];
    }

    public function messages()
    {
        return [];
    }
}
