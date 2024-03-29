<?php

namespace App\Http\Requests\Api;

use App\Constants\CertificateRequest;
use App\Models\SettingModel;

class CertificateRequestRequest extends ApiRequest
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
            'certificate_type' => ['required', 'integer', 'in:' . implode(',', array_keys(CertificateRequest::TYPES))],
            'number_of_copies_vi' => ['required', 'integer'],
            'number_of_copies_en' => ['required', 'integer'],
            'reason' => ['nullable']
        ];
    }

    public function messages()
    {
        return [];
    }
}
