<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

trait ApiResponse
{
    /**
     * @param null $key
     * @param int $code
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function sendMessage($key = null, $code = JsonResponse::HTTP_OK)
    {
        return response([
            'code' => $code,
            'message' => $key ? trans($key) : trans('general.success'),
            'key' => $key ? $key : 'general.success',
        ], $code);
    }

    /**
     * @param array $data
     * @param null $key
     * @param int $code
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function sendSuccess($data = [], $key = null, $code = JsonResponse::HTTP_OK)
    {
        return response([
            'code' => $code,
            'message' => $key ? trans($key) : trans('general.success'),
            'key' => $key ? $key : 'general.success',
            'data' => $data
        ], JsonResponse::HTTP_OK);
    }

    /**
     * @param $errors
     * @param null $key
     * @param int $code
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function sendValidate($errors, $key = null, $code = JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
    {
        return response([
            'code' => $code,
            'message' => $key ? trans($key) : trans('general.success'),
            'key' => $key ? $key : 'general.failed',
            'validate' => $errors
        ], $code);
    }

    /**
     * @param null $key
     * @param int $code
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function sendFailed($key = null, $code = JsonResponse::HTTP_BAD_REQUEST)
    {
        return response([
            'code' => $code,
            'message' => $key ? trans($key) : trans('general.success'),
            'key' => $key ? $key : 'general.failed',
        ], $code);
    }

    /**
     * @param string $key
     * @param \Exception $exp
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function sendError($exp = null, $key = null)
    {
        $code = JsonResponse::HTTP_BAD_REQUEST;
        $debug = config('app.debug');

        $response = [
            'code' => $code,
            'message' => $key ? trans($key) : trans('general.failed'),
            'key' => $key ? $key : 'general.failed',
        ];

        if ($debug && $exp) {
            $response['message'] = $exp->getMessage();
            $response['debug'] = $exp->getTraceAsString();
        }

        if ($debug && config('services.report.email')) {
            $email = config('services.report.email');
//            Mail::to($email)->send(new SystemEmail($response));
        }

        return response($response, $code);
    }
}
