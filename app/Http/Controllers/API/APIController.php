<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Throwable;

class APIController extends Controller
{
    /**
     * Handle API exceptions and log them to the api.log file.
     *
     * @param \Throwable $exception
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function handleApiException(Throwable $exception, Request $request): JsonResponse
    {
        // Determine if it's a 400 or 500 error
        $statusCode = $this->determineStatusCode($exception);

        // Log only 400 or 500 errors
        if ($statusCode >= 400 && $statusCode < 600) {
            $this->logError($exception, $request, $statusCode);
        }

        // Return a standardized JSON error response
        return response()->json([
            'error' => true,
            'message' => $exception->getMessage(),
            'code' => $statusCode
        ], $statusCode);
    }

    /**
     * Log the error details to api.log.
     *
     * @param \Throwable $exception
     * @param \Illuminate\Http\Request $request
     * @param int $statusCode
     * @return void
     */
    protected function logError(Throwable $exception, Request $request, int $statusCode): void
    {
        Log::channel('api')->error('Error in API request', [
            'exception' => $exception->getMessage(),
            'code' => $statusCode,
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'request_body' => $request->all(),
            'headers' => $request->headers->all(),
            'trace' => $exception->getTraceAsString(),
            'user_id' => optional(auth()->user())->id, // Log user if available
        ]);
    }

    /**
     * Determine the HTTP status code from the exception.
     *
     * @param \Throwable $exception
     * @return int
     */
    protected function determineStatusCode(Throwable $exception): int
    {
        // Customize status code determination based on exception type
        if ($exception instanceof \Illuminate\Validation\ValidationException) {
            return Response::HTTP_UNPROCESSABLE_ENTITY; // 422
        }

        if ($exception instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
            return Response::HTTP_NOT_FOUND; // 404
        }

        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\HttpException) {
            return $exception->getStatusCode();
        }

        return Response::HTTP_INTERNAL_SERVER_ERROR; // Default to 500 if no specific status code found
    }
}
