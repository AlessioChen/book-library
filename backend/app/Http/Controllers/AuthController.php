<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\AuthLogoutRequest;
use App\Http\Requests\Auth\AuthLoginRequest;
use App\Http\Requests\Auth\AuthRegisterRequest;
use App\Http\Resources\AuthLoginResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller {

    public function login(AuthLoginRequest $request) {

        $user = User::whereEmail($request->validated('email'))->firstOrFail();

        if ($user->currentAccessToken()) {
            return response()->json([
                'error' => 'user already logged in',
            ]);
        }

        if (!Hash::check($request->validated('password'), $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Invalid credentials'],
            ]);
        }

        return new AuthLoginResource($user);
    }

    public function logout(AuthLogoutRequest $request) {

        Auth::user()->currentAccessToken()->delete();

        return response()->json([
            'message' => "user logged out!",
        ], 204);
    }

    public function register(AuthRegisterRequest $request) {

        $user =  User::create($request->validated());

        return new UserResource($user);
    }
}
