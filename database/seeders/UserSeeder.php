<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Admin Gans',
            'username' => 'admin',
            'email' => 'admin@test.dev',
            'password' => \Hash::make('admin'),
            'role' => 'admin',
            'type' => 'premium',
            'address' => 'tester'
        ];

        User::insert($data);
    }
}
