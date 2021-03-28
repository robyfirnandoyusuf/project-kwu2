<?php

namespace Database\Seeders;

use App\Models\RefProvince;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $json = '[{"id":1,"name":"Aceh","created_at":null,"updated_at":null},{"id":2,"name":"Sumatera Utara","created_at":null,"updated_at":null},{"id":3,"name":"Sumatera Barat","created_at":null,"updated_at":null},{"id":4,"name":"Riau","created_at":null,"updated_at":null},{"id":5,"name":"Jambi","created_at":null,"updated_at":null},{"id":6,"name":"Sumatera Selatan","created_at":null,"updated_at":null},{"id":7,"name":"Bengkulu","created_at":null,"updated_at":null},{"id":8,"name":"Lampung","created_at":null,"updated_at":null},{"id":9,"name":"Kepulauan Bangka Belitung","created_at":null,"updated_at":null},{"id":10,"name":"Kepulauan Riau","created_at":null,"updated_at":null},{"id":11,"name":"DKI Jakarta","created_at":null,"updated_at":null},{"id":12,"name":"Jawa Barat","created_at":null,"updated_at":null},{"id":13,"name":"Jawa Tengah","created_at":null,"updated_at":null},{"id":14,"name":"DI Yogyakarta","created_at":null,"updated_at":null},{"id":15,"name":"Jawa Timur","created_at":null,"updated_at":null},{"id":16,"name":"Banten","created_at":null,"updated_at":null},{"id":17,"name":"Bali","created_at":null,"updated_at":null},{"id":18,"name":"Nusa Tenggara Barat","created_at":null,"updated_at":null},{"id":19,"name":"Nusa Tenggara Timur","created_at":null,"updated_at":null},{"id":20,"name":"Kalimantan Barat","created_at":null,"updated_at":null},{"id":21,"name":"Kalimantan Tengah","created_at":null,"updated_at":null},{"id":22,"name":"Kalimantan Selatan","created_at":null,"updated_at":null},{"id":23,"name":"Kalimantan Timur","created_at":null,"updated_at":null},{"id":24,"name":"Kalimantan Utara","created_at":null,"updated_at":null},{"id":25,"name":"Sulawesi Utara","created_at":null,"updated_at":null},{"id":26,"name":"Sulawesi Tengah","created_at":null,"updated_at":null},{"id":27,"name":"Sulawesi Selatan","created_at":null,"updated_at":null},{"id":28,"name":"Sulawesi Tenggara","created_at":null,"updated_at":null},{"id":29,"name":"Gorontalo","created_at":null,"updated_at":null},{"id":30,"name":"Sulawesi Barat","created_at":null,"updated_at":null},{"id":31,"name":"Maluku","created_at":null,"updated_at":null},{"id":32,"name":"Maluku Utara","created_at":null,"updated_at":null},{"id":33,"name":"Papua","created_at":null,"updated_at":null},{"id":34,"name":"Papua Barat","created_at":null,"updated_at":null}]';
        $data = json_decode($json, true);
        RefProvince::insert($data);
    }
}
