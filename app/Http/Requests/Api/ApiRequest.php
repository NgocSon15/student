<?php

namespace App\Http\Requests\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use App\Traits\ApiResponse;

class ApiRequest extends FormRequest
{
    use ApiResponse;

    /**
     * @param Validator $validator
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(response()
            ->json([
                'code' => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
                'message' => __(reset($errors)[0]),
                'validate' => $errors
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
