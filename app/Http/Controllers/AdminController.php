<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Request;
use App\Models\ContactMessage;

class AdminController extends Controller
{
    private function ensureAdmin(): void
    {
        if (auth()->user()?->role !== 'admin') {
            abort(403, 'Forbidden');
        }
    }

    public function users()
    {
        $this->ensureAdmin();

        return User::with('lists')
            ->get()
            ->map(fn($u) => [
                'userId'   => $u->userId,
                'userName' => $u->userName,
                'email'    => $u->email,
                'role'     => $u->role,
                'lists'    => $u->lists,
            ]);
    }

    public function contactMessages()
    {
        $this->ensureAdmin();

        return ContactMessage::orderBy('created_at', 'desc')->get();
    }

    public function updateUser(int $userId, Request $request)
    {
        $this->ensureAdmin();

        $user = User::findOrFail($userId);
        if ($request->filled('userName')) $user->userName = $request->userName;
        if ($request->filled('email'))    $user->email    = $request->email;
        if ($request->filled('role'))     $user->role     = $request->role;
        $user->save();

        return response()->json([
            'userId'   => $user->userId,
            'userName' => $user->userName,
            'email'    => $user->email,
            'role'     => $user->role,
            'lists'    => $user->lists,
        ]);
    }

    public function importBooks()
    {
        $this->ensureAdmin();

        return app(BookImportController::class)->importRandomByGenre();
    }
}
