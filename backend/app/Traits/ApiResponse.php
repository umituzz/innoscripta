<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Trait ApiResponse
 */
trait ApiResponse
{
    /**
     * Return success status
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
     */
    public function error(array $errors, string $message, int $statusCode = 404): JsonResponse
    {
        $response = [
            'statusCode' => $statusCode,
            'message' => $message,
            'errors' => $errors,
        ];

        return response()->json($response, $statusCode);
    }

    public function ok($data, $message): JsonResponse
    {
        return $this->success($data, Response::HTTP_OK, __($message));
    }

    public function unauthorized(array $data = [], string $message = 'Unauthorized'): JsonResponse
    {
        return $this->error($data, __($message), Response::HTTP_UNAUTHORIZED);
    }

    public function notFound(array $data = [], string $message = 'Not Found'): JsonResponse
    {
        return $this->error($data, __($message), Response::HTTP_NOT_FOUND);
    }
}
