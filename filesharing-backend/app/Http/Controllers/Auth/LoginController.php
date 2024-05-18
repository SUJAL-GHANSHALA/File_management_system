<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function login(LoginRequest $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();
            return response()->json([
                'message' => 'Login successful',
                'user' => $user,
            ], 200);
        }

        // Authentication failed
        return response()->json([
            'message' => 'Invalid credentials',
        ], 401);
    }
}
