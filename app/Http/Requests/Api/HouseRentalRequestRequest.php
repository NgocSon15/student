<?php

namespace App\Http\Requests\Api;

class HouseRentalRequestRequest extends ApiRequest
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
            'name' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'priority' => ['required'],
            'address' => ['required'],
            'phone_number' => ['required', 'min:10', 'max:11'],
            'email' => ['required'],
            'contact_method' => ['required'],
            'files' => ['required', 'array'],
            'files.*' => ['required', 'file']
        ];
    }

    public function messages()
    {
        return [];
    }
}
