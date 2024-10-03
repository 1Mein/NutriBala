<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;

class UserController
{
    public function login(UserRequest $request): \Illuminate\Http\JsonResponse
    {
        $credentials = $request->validated();

        try {
            if (!auth()->attempt($credentials)) {
                return response()->json(['error' => 'Invalid Credentials'], 400);
            }
            $token = \auth()->user()->createToken('token');
        }
        catch (Exception $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }
        $user = Auth::user();
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'authorisation' => [
                'token' => $token->plainTextToken,
                'type' => 'bearer',
            ]
        ]);
    }
}
