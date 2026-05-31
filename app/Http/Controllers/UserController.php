<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        return User::all();
    }

    public function updateProfileIcon(int $userId, Request $request)
    {
        $user = User::findOrFail($userId);
        $user->profileIcon = $request->profileIcon;
        $user->save();
        return response()->json($user);
    }

    public function updateProfile(int $userId, Request $request)
    {
        $user = User::findOrFail($userId);
        if ($request->filled('userName')) $user->userName = $request->userName;
        if ($request->filled('email'))    $user->email    = $request->email;
        $user->save();
        return response()->json($user);
    }

    public function updatePassword(int $userId, Request $request)
    {
        $user = User::findOrFail($userId);
        if (!Hash::check($request->currentPassword, $user->password)) {
            return response()->json(['message' => 'La contraseña actual es incorrecta'], 422);
        }
        $user->password = Hash::make($request->newPassword);
        $user->save();
        return response()->json(['message' => 'Contraseña actualizada']);
    }
}
