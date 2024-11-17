<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Passport\HasApiTokens;
use Validator;
use App\Traits\ResponseTraits;
use Hash;
use Carbon;

class AuthController extends Controller
{
    use ResponseTraits;
    //
    public function UserRegister(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ]);

        if($validator->fails()){
            return response($validator->messages(), 400);
        }
        try {
            $createUser = new User();
            $createUser->name = $request->name;
            $createUser->email = $request->email;
            $createUser->password = Hash::make($request->password);
            $createUser->save();
            return $this->success('User created successfully.',$createUser);
        } catch (\Throwable $th) {
           /// throw $th;
            return $this->error();
        }
    }
}
