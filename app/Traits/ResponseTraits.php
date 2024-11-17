<?php

namespace App\Traits;
use Auth;
use App\Models\User;

trait ResponseTraits
{
    //
    public function error() {
        return response()->json([
            'message' => 'Something went wrong',
        ], 400);
    }
    public function success($message,$data) {
        return response()->json([
            'message' => $message,
            'data' => $data
        ], 200);
    }
    
    public function autherror() {
        return  response()->json([
            'message' => 'Invalid credentials.',
        ], 401);
    }

    public function createToken() {
        $user = Auth::user();
        \Log::info("user :", [$user]);
        $tokenResult = $user->createToken('Personal Access Token');
        $accessToken = $tokenResult->accessToken;
        return response()->json([
            'status' => 'Login successful.',
            'user' => $user,
            'access_token' => $accessToken,
            'token_type' => 'Bearer',
            'expires_at' => $tokenResult->token->expires_at,
        ], 200);
    }
}
