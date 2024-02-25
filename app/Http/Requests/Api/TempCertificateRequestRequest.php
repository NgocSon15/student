<?php

namespace App\Http\Requests\Api;

use App\Constants\TempCertificateRequest;
use App\Models\SettingModel;

class TempCertificateRequestRequest extends ApiRequest
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
            'number_of_copies_vi' => ['required', 'integer'],
            'number_of_copies_en' => ['required', 'integer'],
            'reason' => ['nullable'],
        ];
    }

    public function messages()
    {
        return [];
    }
}
