<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    public function create(UserRequest $request): JsonResponse
    {
        $userRequest = $request->validated();
        $user = User::create([
            'name' => $userRequest['name'],
            'email' => $userRequest['email'],
            'password' =>  bcrypt($userRequest['password']),
        ]);
        return response()->json($user);
    }

    public function getAll(): JsonResponse
    {
        $users = User::All();
        return response()->json($users);
    }

    public function show(string $id): JsonResponse
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function update(string $id, UserUpdateRequest $request): JsonResponse
    {
        $user = User::findOrFail($id);
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
        return response()->json($user);
    }

    public function destroy(string $id): JsonResponse
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json($user);
    }
}
