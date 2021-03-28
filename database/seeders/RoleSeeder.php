<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RefRole;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'ref' => 1,
                'title' => 'Admin'
            ],
            [
                'ref' => 2,
                'title' => 'Mitra'
            ],
            [
                'ref' => 3,
                'title' => 'User'
            ],
        ];

        RefRole::insert($data);
    }
}
