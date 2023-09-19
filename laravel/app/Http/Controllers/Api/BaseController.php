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
     * @param array $errors
     * @param string $message
     * @param int $statusCode
     * @return JsonResponse
     */
    public function error(array $errors, string $message , int $statusCode = 404): JsonResponse
    {
        $response = [
            'statusCode' => $statusCode,
            'errors' => $errors,
            'message' => $message
        ];

        return response()->json($response, $statusCode);
    }
}
