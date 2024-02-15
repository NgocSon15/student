<?php

namespace App\Http\Requests\Api;

use App\Constants\BankLoanRequest;
use App\Models\SettingModel;

class BankLoanRequestRequest extends ApiRequest
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
            'tuition_type' => ['required', 'integer', 'in:' . implode(',', array_keys(BankLoanRequest::TYPES))],
            'reason' => ['nullable']
        ];
    }

    public function messages()
    {
        return [];
    }
}
