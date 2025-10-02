<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    protected function response($success, $message = "", $data = null, $errors = null, $status = 200): JsonResponse
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'data'    => $data,
            'errors'  => $errors,
        ], $status);
    }
}
