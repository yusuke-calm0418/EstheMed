<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {

        User::truncate();
        
        User::create([
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'yusuke',
            'email' => 'uyngs73w@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
