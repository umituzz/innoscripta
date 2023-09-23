<?php

namespace App\Services\Response;

use Illuminate\Http\JsonResponse;

/**
 * Class ResponseService
 * @package App\Services\Response
 */
class ResponseService
{
    /**
     * Return success status
     *
     * @param $data
     * @param $statusCode
     * @param $message
     * @return JsonResponse
     */
    public function ok($data, $statusCode, $message): JsonResponse
    {
        $response = [
            'statusCode' => $statusCode,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($response, $statusCode);
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
            'message' => $message,
            'errors' => $errors,
        ];

        return response()->json($response, $statusCode);
    }
}
