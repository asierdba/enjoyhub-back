<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'email'    => 'required|email|unique:users,email',
            'userName' => 'required',
            'password' => 'required',
        ]);

        $user  = User::create([
            'email'       => $request->email,
            'userName'    => $request->userName,
            'password'    => Hash::make($request->password),
            'role'        => 'user',
            'profileIcon' => $request->profileIcon,
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Usuario registrado',
            'token'   => $token,
            'user'    => $user,
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        $user->tokens()->delete();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login correcto',
            'token'   => $token,
            'user'    => $user,
        ]);
    }

    public function me(Request $request)
    {
        return response()->json($request->user());
    }
}

