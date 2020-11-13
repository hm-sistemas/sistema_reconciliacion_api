<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\UserRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(UserRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($validated);

        $token = $user->createToken($request->device_name)->plainTextToken;

        return (new UserResource($user))->additional([
            'token' => $token,
            'meta' => [
                'success' => true,
                'message' => 'Registro exitoso.',
            ],
        ]);
    }

    public function login(LoginRequest $request)
    {
        $validated = $request->validated();
        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken($request->device_name)->plainTextToken;

        return (new UserResource($user))->additional([
            'token' => $token,
            'meta' => [
                'success' => true,
                'message' => 'Acceso exitoso.',
            ],
        ]);
    }
}