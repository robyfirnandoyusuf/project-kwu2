<?php

namespace Database\Seeders;

use App\Models\RefRole;
use App\Models\RefStatus;
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
            'email' => 'admin@test.dev',
            'gender' => 1,
            'address' => 'tester',
            'password' => \Hash::make('admin'),
            'phone' => '0811321313',
            'role' => RefRole::where('ref', 1)->first()->id,
            'identity' => '',
            'active_status' => RefStatus::where('ref', 1)->first()->id
        ];

        User::insert($data);
    }
}
