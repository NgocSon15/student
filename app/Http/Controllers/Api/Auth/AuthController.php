<?php

namespace App\Http\Controllers\Api\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\UserModel;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return $this->respondWithToken($token, $request->email);
    }

    protected function respondWithToken($token, $email)
    {
        $user = UserModel::where('email', $email)->first();
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 3600,
            'user' => $user ? new UserResource($user) : []
        ]);
    }

    public function logout()
    {
        Auth::logout();
        JWTAuth::invalidate(JWTAuth::parseToken());

        return response()->json(['message' => 'Successfully logged out']);
    }
}
