<?php

namespace App\Http\Requests\Api;

use App\Constants\TranscriptRequest;
use App\Models\SettingModel;

class TranscriptRequestRequest extends ApiRequest
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
            'is_all_semesters' => ['required', 'boolean'],
            'semesters' => ['required_if:is_all_semesters,0', 'array'],
            'semesters.*' => ['nullable', 'integer', 'min:1', 'max:9'],
            'transcript_type' => ['required', 'integer', 'in:' . implode(',', array_keys(TranscriptRequest::TYPES))],
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
