<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class BaseRequest extends FormRequest
{
    protected function response($success, $message, $data = null, $errors = null, $status = 200): JsonResponse
    {
        return response()->json([
            'success' => $success,
            'message' => $message,
            'data'    => $data,
            'errors'  => $errors,
        ], $status);
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors'  => $validator->errors()
            ], 400)
        );
    }
}
