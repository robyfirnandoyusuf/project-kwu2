<?php

namespace Database\Seeders;

use App\Models\RefType;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
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
                'title' => 'Bebas'
            ],
            [
                'ref' => 2,
                'title' => 'Kos Putra'
            ],
            [
                'ref' => 3,
                'title' => 'Kos Putri'
            ],
        ];

        RefType::insert($data);
    }
}
