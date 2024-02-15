<?php

namespace App\Http\Requests\Api;

use App\Constants\PauseTuitionRequest;
use App\Models\SettingModel;

class PauseTuitionRequestRequest extends ApiRequest
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
            'semester' => ['required', 'integer'],
            'school_year' => ['required'],
            'end_date' => ['required'],
            'reason' => ['nullable']
        ];
    }

    public function messages()
    {
        return [];
    }
}
