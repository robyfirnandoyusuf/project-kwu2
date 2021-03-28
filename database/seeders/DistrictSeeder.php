<?php

namespace Database\Seeders;

use App\Models\RefDistrict;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $f = file_get_contents(database_path()."/json/district.txt");
        $j = json_decode($f, true);
        RefDistrict::insert($j);
    }
}
