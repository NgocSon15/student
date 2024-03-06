<?php

namespace App\Http\Requests\Api;

use App\Constants\BusCardRequest;

class BusCardRequestRequest extends ApiRequest
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
            'bus_number' => ['required_if:interline_bus_type,null'],
            'interline_bus_type' => ['required_if:bus_number,null', 'integer', 'in:' . implode(',', array_keys(BusCardRequest::INTERLINE_BUS_TYPE))],
            'address' => ['required'],
            'phone_number' => ['required', 'min:10', 'max:11'],
            'process_place' => ['required'],
        ];
    }

    public function messages()
    {
        return [];
    }
}
