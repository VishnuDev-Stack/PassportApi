<?php

namespace App\Traits;

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
}
