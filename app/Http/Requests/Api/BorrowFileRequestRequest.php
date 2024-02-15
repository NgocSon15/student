<?php

namespace App\Http\Requests\Api;

use App\Constants\BorrowFileRequest;
use App\Models\SettingModel;

class BorrowFileRequestRequest extends ApiRequest
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
            'file_types' => ['required_without:other_file', 'array'],
            'file_types.*' => ['nullable', 'integer', 'in:' . implode(',', array_keys(BorrowFileRequest::TYPES))],
            'other_file' => ['nullable'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'reason' => ['nullable']
        ];
    }

    public function messages()
    {
        return [];
    }
}
