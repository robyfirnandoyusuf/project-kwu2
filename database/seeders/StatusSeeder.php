<?php

namespace Database\Seeders;

use App\Models\RefStatus;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
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
                'title' => 'active'
            ],
            [
                'ref' => 2,
                'title' => 'non-active'
            ],

            // midtrans status
            [
                'ref' => 3,
                'title' => 'pending'
            ],
            [
                'ref' => 4,
                'title' => 'capture'
            ],
            [
                'ref' => 5,
                'title' => 'settlement'
            ],
            [
                'ref' => 6,
                'title' => 'deny'
            ],
            [
                'ref' => 7,
                'title' => 'cancel'
            ],
            [
                'ref' => 8,
                'title' => 'failure'
            ],
            [
                'ref' => 9,
                'title' => 'refund'
            ],
            [
                'ref' => 10,
                'title' => 'chargeback'
            ],

            // rent
            [
                'ref' => 11,
                'title' => 'waiting'
            ],
            [
                'ref' => 12,
                'title' => 'accept'
            ],
        ];

        RefStatus::insert($data);
    }
}
