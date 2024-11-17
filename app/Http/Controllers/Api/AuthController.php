<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Passport\HasApiTokens;
use Validator;

class AuthController extends Controller
{
    //
    public function UserRegister(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|exists:users,email',
            'password' => 'required|min:8|confirmed'
        ]);

        if($validator->fails()){
            return response($validator->messages(), 400);
        }
    }
}
