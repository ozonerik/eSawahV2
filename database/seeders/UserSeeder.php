<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create(
            [
                'name' => 'Admin',
                'email' => 'admin@test.id',
                'password' => Hash::make('1234567890'),
            ]);
        $user->assignRole('admin');
        $user = User::create(
            [
                'name' => 'User',
                'email' => 'user@test.id',
                'password' => Hash::make('1234567890'),
            ]);
        $user->assignRole('user');
    }
}
