<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request) {
        $data = $request->validate([
            'name' => ['required','string'],
            'email' => ['required','email','unique:users'],
            'password' => ['required','min:6']
        ]);
        $user = User::create($data);
        $token = $user->createToken('auth_token')->plainTextToken;
        return [
            'user' => $user,
            'token' => $token
        ];
    }

    public function login(Request $request) {
        $data = $request->validate([
            'email' => ['required','email','exists:users'],
            'password' => ['required','min:6']
        ]);
        $user = User::where('email',$data['email'])->first();
        if (!$user || !Hash::check($data['password'],$user->password)) {
            return response([
                'message' => 'invalid',
            ],401);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        return [
            'user' => $user,
            'token' => $token
        ];
    }

    public function userProfile() {
        $userData = auth()->user();
        return response()->json([
            'status' => true,
            'message' => 'User login profile',
            'data' => $userData,
            'id' => auth()->user()->id
        ], status: 200);
    }

    public function logout() {
        auth()->user()->tokens()->delete();
        return response()->json([
            'status' => true,
            'message' => 'Logout Token',
            'data' => []
        ],200);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }

    public function loginApi()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

}
