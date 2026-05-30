<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::updateOrCreate(
            ['email' => 'admin@enjoyhub.com'], 
            [
                'userName' => 'Admin',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'profileIcon' => 'default_admin.png',
            ]
        );
    }
}
