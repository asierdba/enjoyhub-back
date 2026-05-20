<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validación mínima
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'userName' => 'required',
            'password' => 'required'
        ]);

        // Crear usuario
        $user = User::create([
            'email' => $request->email,
            'userName' => $request->userName,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'profileIcon' => null
        ]);

        return response()->json([
            'message' => 'Usuario registrado',
            'user' => $user
        ]);
    }

    public function login(Request $request)
    {
        // Validación mínima
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // Buscar usuario
        $user = User::where('email', $request->email)->first();

        // Comprobar contraseña
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        return response()->json([
            'message' => 'Login correcto',
            'user' => $user
        ]);
    }
}

