<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use ResponseTrait;

    public function login() {}

    public function register(Request $request)
    {

        $rules = [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return $this->fail('We have an error', $validator->errors());
        }

        $user = User::create([
            'name' => $request?->name,
            'email' => $request?->email,
            'password' => $request?->password,
        ]);

        $token = $user->createToken('food_site')->plainTextToken;

        return $this->success('Register successfully', ['token' => $token]);
    }
}
