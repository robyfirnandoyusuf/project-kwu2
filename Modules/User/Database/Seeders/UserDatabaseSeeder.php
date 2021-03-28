<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\User;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
        $data = [
            'name' => 'Admin Gans',
            'address' => 'Jl.in dulu aja',
            'email' => 'admin@test.dev',
            'gender' => '1',
            'password' => \Hash::make('admin'),
            'phone' => '0823434324',
            'role' => 'admin',
            'type' => 'premium',
            'address' => 'tester'
        ];

        User::insert($data);
    }
}
