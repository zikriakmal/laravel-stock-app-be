<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;
use Illuminate\Http\JsonResponse;

class AuthController extends BaseController
{
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return $this->response(false, 'Invalid credentials', null, ['error' => 'Unauthorized'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('authToken')->accessToken;

        return $this->response(true, 'Login successful', [
            'user' => $user,
            'access_token' => $token,
        ]);
    }
}
