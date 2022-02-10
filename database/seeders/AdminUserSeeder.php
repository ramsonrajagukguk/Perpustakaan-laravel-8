<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Administrasi',
            'email' => 'admin@mail.test',
            'password' => Hash::make('1'),
            'email_verified_at' => now(),
        ]);

        $user->assignRole('admin');
    }
}