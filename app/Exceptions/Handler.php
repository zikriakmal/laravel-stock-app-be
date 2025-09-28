<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            return response()->json([
                'success' => false,
                'errors' => $exception->errors(),
                'message' => 'Validation failed. Please check your input.'
            ], 422);
        }
        return parent::render($request, $exception);
    }
}
