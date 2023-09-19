<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
 * Class BaseController
 * @package App\Http\Controllers\Api
 */
class BaseController extends Controller
{
    /**
     * Return success status
     *
     * @param $result
     * @param $message
     * @return JsonResponse
     */
    public function ok($data, $statusCode, $message): JsonResponse
    {
        $response = [
            'statusCode' => $statusCode,
            'data' => $data,
            'message' => $message
        ];

        return response()->json($response);
    }

    /**
     * Return error status
     *
     * @param $message
     * @param array $errors
     * @param int $code
     * @return JsonResponse
     */
    public function error($message, array $errors = [], int $code = 404): JsonResponse
    {
        $response = [
            'statusCode' => $statusCode,
            'message' => $message
        ];

        if (!empty($errors)) $response['data'] = $errors;

        return response()->json($response, $code);
    }
}
