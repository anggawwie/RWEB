<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // REGISTER + token
    public function register(Request $req)
    {
        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password)
        ]);

        // buat token setelah user dibuat
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'Register berhasil',
            'user' => $user,
            'token' => $token
        ]);
    }

    // LOGIN
    public function login(Request $req)
    {
        if (!Auth::attempt($req->only('email', 'password'))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $token = $req->user()->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil',
            'token' => $token
        ]);
    }
}
