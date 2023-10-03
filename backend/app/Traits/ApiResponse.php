<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Trait ApiResponse
 * @package App\Traits
 */
trait ApiResponse
{
    /**
     * Return success status
     *
     * @param $data
     * @param $statusCode
     * @param $message
     * @return JsonResponse
     */
    public function success($data, $statusCode, $message): JsonResponse
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

    /**
     * @param $data
     * @param $message
     * @return JsonResponse
     */
    public function ok($data,  $message): JsonResponse
    {
        return $this->success($data, Response::HTTP_OK, __($message));
    }

    /**
     * @param array $data
     * @param string $message
     * @return JsonResponse
     */
    public function unauthorized(array $data = [], string $message = 'Unauthorized'): JsonResponse
    {
        return $this->error($data, __($message), Response::HTTP_UNAUTHORIZED);
    }

    /**
     * @param array $data
     * @param string $message
     * @return JsonResponse
     */
    public function notFound(array $data = [], string $message = 'Not Found'): JsonResponse
    {
        return $this->error($data, __($message), Response::HTTP_NOT_FOUND);
    }
}
