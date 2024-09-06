<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\Auth\APILoginRequest;
use Illuminate\Http\Request;

class AuthController extends APIController
{
    public function login(APILoginRequest $request)
    {
        try {
            $user = $request->authenticate();

            return response()->json([
                'success' => true,
                'data' => $user
            ]);
        } catch (\Throwable $exception) {
            return $this->handleApiException($exception, request());
        }
    }

    public function logout(Request $request)
    {
        try {
            /** @var \App\Models\User $user **/
            $user = $request->user();
            $user->tokens()->delete();

            return response()->json([
                'success' => true
            ]);
        } catch (\Throwable $exception) {
            return $this->handleApiException($exception, request());
        }
    }

    public function profile(Request $request)
    {
        try {
            $user = $request->user();

            return response()->json([
                'success' => true,
                'data' => $user
            ]);
        } catch (\Throwable $exception) {
            return $this->handleApiException($exception, request());
        }
    }
}
