<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
    public function create(UserRequest $request): JsonResponse
    {
        $userRequest = $request->validated();
        $user = User::create([
            'name' => $userRequest['name'],
            'email' => $userRequest['email'],
            'password' =>  bcrypt($userRequest['password']),
        ]);
        return $this->response(true, 'User created', $user);
    }

    public function getAll(): JsonResponse
    {
        $users = User::all();
        return $this->response(true, 'Users retrieved', $users);
    }

    public function show(string $id): JsonResponse
    {
        $user = User::find($id);
        if (!$user) {
            return $this->response(false, 'User not found', null, ['id' => 'Not found'], 404);
        }
        return $this->response(true, 'User retrieved', $user);
    }

    public function update(string $id, UserUpdateRequest $request): JsonResponse
    {
        $user = User::find($id);
        if (!$user) {
            return $this->response(false, 'User not found', null, ['id' => 'Not found'], 404);
        }
        $data = [];
        $validated = $request->validated();
        if (array_key_exists('name', $validated)) {
            $data['name'] = $validated['name'];
        }
        if (array_key_exists('email', $validated)) {
            $data['email'] = $validated['email'];
        }
        if (array_key_exists('password', $validated)) {
            $data['password'] = bcrypt($validated['password']);
        }
        if (!empty($data)) {
            $user->update($data);
        }
        return $this->response(true, 'User updated', $user);
    }

    public function destroy(string $id): JsonResponse
    {
        $user = User::find($id);
        if (!$user) {
            return $this->response(false, 'User not found', null, ['id' => 'Not found'], 404);
        }
        $user->delete();
        return $this->response(true, 'User deleted', $user);
    }
    public function myInfo(): JsonResponse
    {
        $data = Auth::user();
        return $this->response(true, 'Success get my info', $data);
    }
}
