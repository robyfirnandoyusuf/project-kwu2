<?php

namespace Database\Seeders;

use App\Models\RefCity;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = '[
            {
               "id":1,
               "province_id":1,
               "name":"Kab. Aceh Selatan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":2,
               "province_id":1,
               "name":"Kab. Aceh Tenggara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":3,
               "province_id":1,
               "name":"Kab. Aceh Timur",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":4,
               "province_id":1,
               "name":"Kab. Aceh Tengah",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":5,
               "province_id":1,
               "name":"Kab. Aceh Bara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":6,
               "province_id":1,
               "name":"Kab. Aceh Besar",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":7,
               "province_id":1,
               "name":"Kab. Pidie",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":8,
               "province_id":1,
               "name":"Kab. Aceh Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":9,
               "province_id":1,
               "name":"Kab. Simeulue",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":10,
               "province_id":1,
               "name":"Kab. Aceh Singkil",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":11,
               "province_id":1,
               "name":"Kab. Bireuen",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":12,
               "province_id":1,
               "name":"Kab. Aceh Barat Daya",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":13,
               "province_id":1,
               "name":"Kab. Gayo Lues",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":14,
               "province_id":1,
               "name":"Kab. Aceh Jaya",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":15,
               "province_id":1,
               "name":"Kab. Nagan Raya",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":16,
               "province_id":1,
               "name":"Kab. Aceh Tamiang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":17,
               "province_id":1,
               "name":"Kab. Bener Meriah",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":18,
               "province_id":1,
               "name":"Kab. Pidie Jaya",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":19,
               "province_id":1,
               "name":"Kota Banda Aceh",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":20,
               "province_id":1,
               "name":"Kota Sabang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":21,
               "province_id":1,
               "name":"Kota Lhokseumawe",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":22,
               "province_id":1,
               "name":"Kota Langsa",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":23,
               "province_id":1,
               "name":"Kota Subulussalam",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":24,
               "province_id":2,
               "name":"Kab. Tapanuli Tengah",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":25,
               "province_id":2,
               "name":"Kab. Tapanuli Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":26,
               "province_id":2,
               "name":"Kab. Tapanuli Selatan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":27,
               "province_id":2,
               "name":"Kab. Nias",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":28,
               "province_id":2,
               "name":"Kab. Langkat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":29,
               "province_id":2,
               "name":"Kab. Karo",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":30,
               "province_id":2,
               "name":"Kab. Deli Serdang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":31,
               "province_id":2,
               "name":"Kab. Simalungun",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":32,
               "province_id":2,
               "name":"Kab. Asahan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":33,
               "province_id":2,
               "name":"Kab. Labuhanbatu",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":34,
               "province_id":2,
               "name":"Kab. Dairi",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":35,
               "province_id":2,
               "name":"Kab. Toba Samosir",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":36,
               "province_id":2,
               "name":"Kab. Mandailing Natal",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":37,
               "province_id":2,
               "name":"Kab. Nias Selatan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":38,
               "province_id":2,
               "name":"Kab. Pakpak Bharat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":39,
               "province_id":2,
               "name":"Kab. Humbang Hasundutan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":40,
               "province_id":2,
               "name":"Kab. Samosir",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":41,
               "province_id":2,
               "name":"Kab. Serdang Bedagai",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":42,
               "province_id":2,
               "name":"Kab. Batu Bara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":43,
               "province_id":2,
               "name":"Kab. Padang Lawas Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":44,
               "province_id":2,
               "name":"Kab. Padang Lawas",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":45,
               "province_id":2,
               "name":"Kab. Labuhanbatu Selatan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":46,
               "province_id":2,
               "name":"Kab. Labuhanbatu Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":47,
               "province_id":2,
               "name":"Kab. Nias Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":48,
               "province_id":2,
               "name":"Kab. Nias Barat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":49,
               "province_id":2,
               "name":"Kota Medan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":50,
               "province_id":2,
               "name":"Kota Pematang Siantar",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":51,
               "province_id":2,
               "name":"Kota Sibolga",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":52,
               "province_id":2,
               "name":"Kota Tanjung Balai",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":53,
               "province_id":2,
               "name":"Kota Binjai",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":54,
               "province_id":2,
               "name":"Kota Tebing Tinggi",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":55,
               "province_id":2,
               "name":"Kota Padang Sidempuan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":56,
               "province_id":2,
               "name":"Kota Gunungsitoli",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":57,
               "province_id":3,
               "name":"Kab. Pesisir Selatan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":58,
               "province_id":3,
               "name":"Kab. Solok",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":59,
               "province_id":3,
               "name":"Kab. Sijunjung",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":60,
               "province_id":3,
               "name":"Kab. Tanah Datar",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":61,
               "province_id":3,
               "name":"Kab. Padang Pariaman",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":62,
               "province_id":3,
               "name":"Kab. Agam",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":63,
               "province_id":3,
               "name":"Kab. Lima Puluh Kota",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":64,
               "province_id":3,
               "name":"Kab. Pasaman",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":65,
               "province_id":3,
               "name":"Kab. Kepulauan Mentawai",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":66,
               "province_id":3,
               "name":"Kab. Dharmasraya",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":67,
               "province_id":3,
               "name":"Kab. Solok Selatan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":68,
               "province_id":3,
               "name":"Kab. Pasaman Barat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":69,
               "province_id":3,
               "name":"Kota Padang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":70,
               "province_id":3,
               "name":"Kota Solok",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":71,
               "province_id":3,
               "name":"Kota Sawah Lunto",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":72,
               "province_id":3,
               "name":"Kota Padang Panjang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":73,
               "province_id":3,
               "name":"Kota Bukittinggi",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":74,
               "province_id":3,
               "name":"Kota Payakumbuh",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":75,
               "province_id":3,
               "name":"Kota Pariaman",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":76,
               "province_id":4,
               "name":"Kab. Kampar",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":77,
               "province_id":4,
               "name":"Kab. Indragiri Hulu",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":78,
               "province_id":4,
               "name":"Kab. Bengkalis",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":79,
               "province_id":4,
               "name":"Kab. Indragiri Hilir",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":80,
               "province_id":4,
               "name":"Kab. Pelalawan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":81,
               "province_id":4,
               "name":"Kab. Rokan Hulu",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":82,
               "province_id":4,
               "name":"Kab. Rokan Hilir",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":83,
               "province_id":4,
               "name":"Kab. Siak",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":84,
               "province_id":4,
               "name":"Kab. Kuantan Singingi",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":85,
               "province_id":4,
               "name":"Kab. Kepulauan Meranti",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":86,
               "province_id":4,
               "name":"Kota Pekanbaru",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":87,
               "province_id":4,
               "name":"Kota Dumai",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":88,
               "province_id":5,
               "name":"Kab. Kerinci",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":89,
               "province_id":5,
               "name":"Kab. Merangin",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":90,
               "province_id":5,
               "name":"Kab. Sarolangun",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":91,
               "province_id":5,
               "name":"Kab. Batang Hari",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":92,
               "province_id":5,
               "name":"Kab. Muaro Jambi",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":93,
               "province_id":5,
               "name":"Kab. Tanjung Jabung Barat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":94,
               "province_id":5,
               "name":"Kab. Tanjung Jabung Timur",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":95,
               "province_id":5,
               "name":"Kab. Bungo",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":96,
               "province_id":5,
               "name":"Kab. Tebo",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":97,
               "province_id":5,
               "name":"Kota Jambi",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":98,
               "province_id":5,
               "name":"Kota Sungaipenuh",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":99,
               "province_id":6,
               "name":"Kab. Ogan Komering Ulu",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":100,
               "province_id":6,
               "name":"Kab. Ogan Komering Ilir",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":101,
               "province_id":6,
               "name":"Kab. Muara Enim",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":102,
               "province_id":6,
               "name":"Kab. Lahat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":103,
               "province_id":6,
               "name":"Kab. Musi Rawas",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":104,
               "province_id":6,
               "name":"Kab. Musi Banyuasin",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":105,
               "province_id":6,
               "name":"Kab. Banyuasin",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":106,
               "province_id":6,
               "name":"Kab. Ogan Komering Ulu Timur",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":107,
               "province_id":6,
               "name":"Kab. Ogan Komering Ulu Selatan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":108,
               "province_id":6,
               "name":"Kab. Ogan Ilir",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":109,
               "province_id":6,
               "name":"Kab. Empat Lawang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":110,
               "province_id":6,
               "name":"Kab. Penukal Abab Lematang Ilir",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":111,
               "province_id":6,
               "name":"Kab. Musi Rawas Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":112,
               "province_id":6,
               "name":"Kota Palembang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":113,
               "province_id":6,
               "name":"Kota Pagar Alam",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":114,
               "province_id":6,
               "name":"Kota Lubuk Linggau",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":115,
               "province_id":6,
               "name":"Kota Prabumulih",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":116,
               "province_id":7,
               "name":"Kab. Bengkulu Selatan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":117,
               "province_id":7,
               "name":"Kab. Rejang Lebong",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":118,
               "province_id":7,
               "name":"Kab. Bengkulu Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":119,
               "province_id":7,
               "name":"Kab. Kaur",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":120,
               "province_id":7,
               "name":"Kab. Seluma",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":121,
               "province_id":7,
               "name":"Kab. Muko Muko",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":122,
               "province_id":7,
               "name":"Kab. Lebong",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":123,
               "province_id":7,
               "name":"Kab. Kepahiang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":124,
               "province_id":7,
               "name":"Kab. Bengkulu Tengah",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":125,
               "province_id":7,
               "name":"Kota Bengkulu",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":126,
               "province_id":8,
               "name":"Kab. Lampung Selatan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":127,
               "province_id":8,
               "name":"Kab. Lampung Tengah",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":128,
               "province_id":8,
               "name":"Kab. Lampung Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":129,
               "province_id":8,
               "name":"Kab. Lampung Barat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":130,
               "province_id":8,
               "name":"Kab. Tulang Bawang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":131,
               "province_id":8,
               "name":"Kab. Tanggamus",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":132,
               "province_id":8,
               "name":"Kab. Lampung Timur",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":133,
               "province_id":8,
               "name":"Kab. Way Kanan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":134,
               "province_id":8,
               "name":"Kab. Pesawaran",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":135,
               "province_id":8,
               "name":"Kab. Pringsewu",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":136,
               "province_id":8,
               "name":"Kab. Mesuji",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":137,
               "province_id":8,
               "name":"Kab. Tulang Bawang Barat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":138,
               "province_id":8,
               "name":"Kab. Pesisir Barat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":139,
               "province_id":8,
               "name":"Kota Bandar Lampung",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":140,
               "province_id":8,
               "name":"Kota Metro",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":141,
               "province_id":9,
               "name":"Kab. Bangka",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":142,
               "province_id":9,
               "name":"Kab. Belitung",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":143,
               "province_id":9,
               "name":"Kab. Bangka Selatan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":144,
               "province_id":9,
               "name":"Kab. Bangka Tengah",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":145,
               "province_id":9,
               "name":"Kab. Bangka Barat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":146,
               "province_id":9,
               "name":"Kab. Belitung Timur",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":147,
               "province_id":9,
               "name":"Kota Pangkal Pinang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":148,
               "province_id":10,
               "name":"Kab. Bintan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":149,
               "province_id":10,
               "name":"Kab. Karimun",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":150,
               "province_id":10,
               "name":"Kab. Natuna",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":151,
               "province_id":10,
               "name":"Kab. Lingga",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":152,
               "province_id":10,
               "name":"Kab. Kepulauan Anambas",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":153,
               "province_id":10,
               "name":"Kota Batam",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":154,
               "province_id":10,
               "name":"Kota Tanjung Pinang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":155,
               "province_id":11,
               "name":"Kab. Kepulauan Seribu",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":156,
               "province_id":11,
               "name":"Kota Jakarta Pusat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":157,
               "province_id":11,
               "name":"Kota Jakarta Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":158,
               "province_id":11,
               "name":"Kota Jakarta Barat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":159,
               "province_id":11,
               "name":"Kota Jakarta Selatan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":160,
               "province_id":11,
               "name":"Kota Jakarta Timur",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":161,
               "province_id":12,
               "name":"Kab. Bogor",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":162,
               "province_id":12,
               "name":"Kab. Sukabumi",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":163,
               "province_id":12,
               "name":"Kab. Cianjur",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":164,
               "province_id":12,
               "name":"Kab. Bandung",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":165,
               "province_id":12,
               "name":"Kab. Garut",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":166,
               "province_id":12,
               "name":"Kab. Tasikmalaya",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":167,
               "province_id":12,
               "name":"Kab. Ciamis",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":168,
               "province_id":12,
               "name":"Kab. Kuningan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":169,
               "province_id":12,
               "name":"Kab. Cirebon",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":170,
               "province_id":12,
               "name":"Kab. Majalengka",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":171,
               "province_id":12,
               "name":"Kab. Sumedang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":172,
               "province_id":12,
               "name":"Kab. Indramayu",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":173,
               "province_id":12,
               "name":"Kab. Subang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":174,
               "province_id":12,
               "name":"Kab. Purwakarta",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":175,
               "province_id":12,
               "name":"Kab. Karawang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":176,
               "province_id":12,
               "name":"Kab. Bekasi",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":177,
               "province_id":12,
               "name":"Kab. Bandung Barat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":178,
               "province_id":12,
               "name":"Kab. Pangandaran",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":179,
               "province_id":12,
               "name":"Kota Bogor",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":180,
               "province_id":12,
               "name":"Kota Sukabumi",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":181,
               "province_id":12,
               "name":"Kota Bandung",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":182,
               "province_id":12,
               "name":"Kota Cirebon",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":183,
               "province_id":12,
               "name":"Kota Bekasi",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":184,
               "province_id":12,
               "name":"Kota Depok",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":185,
               "province_id":12,
               "name":"Kota Cimahi",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":186,
               "province_id":12,
               "name":"Kota Tasikmalaya",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":187,
               "province_id":12,
               "name":"Kota Banjar",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":188,
               "province_id":13,
               "name":"Kab. Cilacap",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":189,
               "province_id":13,
               "name":"Kab. Banyumas",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":190,
               "province_id":13,
               "name":"Kab. Purbalingga",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":191,
               "province_id":13,
               "name":"Kab. Banjarnegara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":192,
               "province_id":13,
               "name":"Kab. Kebumen",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":193,
               "province_id":13,
               "name":"Kab. Purworejo",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":194,
               "province_id":13,
               "name":"Kab. Wonosobo",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":195,
               "province_id":13,
               "name":"Kab. Magelang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":196,
               "province_id":13,
               "name":"Kab. Boyolali",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":197,
               "province_id":13,
               "name":"Kab. Klaten",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":198,
               "province_id":13,
               "name":"Kab. Sukoharjo",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":199,
               "province_id":13,
               "name":"Kab. Wonogiri",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":200,
               "province_id":13,
               "name":"Kab. Karanganyar",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":201,
               "province_id":13,
               "name":"Kab. Sragen",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":202,
               "province_id":13,
               "name":"Kab. Grobogan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":203,
               "province_id":13,
               "name":"Kab. Blora",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":204,
               "province_id":13,
               "name":"Kab. Rembang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":205,
               "province_id":13,
               "name":"Kab. Pati",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":206,
               "province_id":13,
               "name":"Kab. Kudus",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":207,
               "province_id":13,
               "name":"Kab. Jepara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":208,
               "province_id":13,
               "name":"Kab. Demak",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":209,
               "province_id":13,
               "name":"Kab. Semarang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":210,
               "province_id":13,
               "name":"Kab. Temanggung",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":211,
               "province_id":13,
               "name":"Kab. Kendal",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":212,
               "province_id":13,
               "name":"Kab. Batang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":213,
               "province_id":13,
               "name":"Kab. Pekalongan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":214,
               "province_id":13,
               "name":"Kab. Pemalang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":215,
               "province_id":13,
               "name":"Kab. Tegal",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":216,
               "province_id":13,
               "name":"Kab. Brebes",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":217,
               "province_id":13,
               "name":"Kota Magelang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":218,
               "province_id":13,
               "name":"Kota Surakarta",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":219,
               "province_id":13,
               "name":"Kota Salatiga",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":220,
               "province_id":13,
               "name":"Kota Semarang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":221,
               "province_id":13,
               "name":"Kota Pekalongan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":222,
               "province_id":13,
               "name":"Kota Tegal",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":223,
               "province_id":14,
               "name":"Kab. Kulon Progo",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":224,
               "province_id":14,
               "name":"Kab. Bantul",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":225,
               "province_id":14,
               "name":"Kab. Gunung Kidul",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":226,
               "province_id":14,
               "name":"Kab. Sleman",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":227,
               "province_id":14,
               "name":"Kota Yogyakarta",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":228,
               "province_id":15,
               "name":"Kab. Pacitan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":229,
               "province_id":15,
               "name":"Kab. Ponorogo",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":230,
               "province_id":15,
               "name":"Kab. Trenggalek",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":231,
               "province_id":15,
               "name":"Kab. Tulungagung",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":232,
               "province_id":15,
               "name":"Kab. Blitar",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":233,
               "province_id":15,
               "name":"Kab. Kediri",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":234,
               "province_id":15,
               "name":"Kab. Malang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":235,
               "province_id":15,
               "name":"Kab. Lumajang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":236,
               "province_id":15,
               "name":"Kab. Jember",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":237,
               "province_id":15,
               "name":"Kab. Banyuwangi",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":238,
               "province_id":15,
               "name":"Kab. Bondowoso",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":239,
               "province_id":15,
               "name":"Kab. Situbondo",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":240,
               "province_id":15,
               "name":"Kab. Probolinggo",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":241,
               "province_id":15,
               "name":"Kab. Pasuruan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":242,
               "province_id":15,
               "name":"Kab. Sidoarjo",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":243,
               "province_id":15,
               "name":"Kab. Mojokerto",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":244,
               "province_id":15,
               "name":"Kab. Jombang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":245,
               "province_id":15,
               "name":"Kab. Nganjuk",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":246,
               "province_id":15,
               "name":"Kab. Madiun",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":247,
               "province_id":15,
               "name":"Kab. Magetan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":248,
               "province_id":15,
               "name":"Kab. Ngawi",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":249,
               "province_id":15,
               "name":"Kab. Bojonegoro",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":250,
               "province_id":15,
               "name":"Kab. Tuban",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":251,
               "province_id":15,
               "name":"Kab. Lamongan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":252,
               "province_id":15,
               "name":"Kab. Gresik",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":253,
               "province_id":15,
               "name":"Kab. Bangkalan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":254,
               "province_id":15,
               "name":"Kab. Sampang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":255,
               "province_id":15,
               "name":"Kab. Pamekasan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":256,
               "province_id":15,
               "name":"Kab. Sumenep",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":257,
               "province_id":15,
               "name":"Kota Kediri",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":258,
               "province_id":15,
               "name":"Kota Blitar",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":259,
               "province_id":15,
               "name":"Kota Malang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":260,
               "province_id":15,
               "name":"Kota Probolinggo",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":261,
               "province_id":15,
               "name":"Kota Pasuruan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":262,
               "province_id":15,
               "name":"Kota Mojokerto",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":263,
               "province_id":15,
               "name":"Kota Madiun",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":264,
               "province_id":15,
               "name":"Kota Surabaya",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":265,
               "province_id":15,
               "name":"Kota Batu",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":266,
               "province_id":16,
               "name":"Kab. Pandeglang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":267,
               "province_id":16,
               "name":"Kab. Lebak",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":268,
               "province_id":16,
               "name":"Kab. Tangerang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":269,
               "province_id":16,
               "name":"Kab. Serang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":270,
               "province_id":16,
               "name":"Kota Tangerang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":271,
               "province_id":16,
               "name":"Kota Cilegon",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":272,
               "province_id":16,
               "name":"Kota Serang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":273,
               "province_id":16,
               "name":"Kota Tangerang Selatan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":274,
               "province_id":17,
               "name":"Kab. Jembrana",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":275,
               "province_id":17,
               "name":"Kab. Tabanan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":276,
               "province_id":17,
               "name":"Kab. Badung",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":277,
               "province_id":17,
               "name":"Kab. Gianyar",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":278,
               "province_id":17,
               "name":"Kab. Klungkung",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":279,
               "province_id":17,
               "name":"Kab. Bangli",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":280,
               "province_id":17,
               "name":"Kab. Karangasem",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":281,
               "province_id":17,
               "name":"Kab. Buleleng",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":282,
               "province_id":17,
               "name":"Kota Denpasar",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":283,
               "province_id":18,
               "name":"Kab. Lombok Barat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":284,
               "province_id":18,
               "name":"Kab. Lombok Tengah",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":285,
               "province_id":18,
               "name":"Kab. Lombok Timur",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":286,
               "province_id":18,
               "name":"Kab. Sumbawa",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":287,
               "province_id":18,
               "name":"Kab. Dompu",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":288,
               "province_id":18,
               "name":"Kab. Bima",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":289,
               "province_id":18,
               "name":"Kab. Sumbawa Barat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":290,
               "province_id":18,
               "name":"Kab. Lombok Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":291,
               "province_id":18,
               "name":"Kota Mataram",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":292,
               "province_id":18,
               "name":"Kota Bima",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":293,
               "province_id":19,
               "name":"Kab. Kupang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":294,
               "province_id":19,
               "name":"Kab. Timor Tengah Selatan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":295,
               "province_id":19,
               "name":"Kab. Timor Tengah Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":296,
               "province_id":19,
               "name":"Kab. Belu",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":297,
               "province_id":19,
               "name":"Kab. Alor",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":298,
               "province_id":19,
               "name":"Kab. Flores Timur",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":299,
               "province_id":19,
               "name":"Kab. Sikka",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":300,
               "province_id":19,
               "name":"Kab. Ende",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":301,
               "province_id":19,
               "name":"Kab. Ngada",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":302,
               "province_id":19,
               "name":"Kab. Manggarai",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":303,
               "province_id":19,
               "name":"Kab. Sumba Timur",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":304,
               "province_id":19,
               "name":"Kab. Sumba Barat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":305,
               "province_id":19,
               "name":"Kab. Lembata",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":306,
               "province_id":19,
               "name":"Kab. Rote Ndao",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":307,
               "province_id":19,
               "name":"Kab. Manggarai Barat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":308,
               "province_id":19,
               "name":"Kab. Nagekeo",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":309,
               "province_id":19,
               "name":"Kab. Sumba Tengah",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":310,
               "province_id":19,
               "name":"Kab. Sumba Barat Daya",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":311,
               "province_id":19,
               "name":"Kab. Manggarai Timur",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":312,
               "province_id":19,
               "name":"Kab. Sabu Raijua",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":313,
               "province_id":19,
               "name":"Kab. Malaka",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":314,
               "province_id":19,
               "name":"Kota Kupang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":315,
               "province_id":20,
               "name":"Kab. Sambas",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":316,
               "province_id":20,
               "name":"Kab. Mempawah",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":317,
               "province_id":20,
               "name":"Kab. Sanggau",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":318,
               "province_id":20,
               "name":"Kab. Ketapang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":319,
               "province_id":20,
               "name":"Kab. Sintang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":320,
               "province_id":20,
               "name":"Kab. Kapuas Hulu",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":321,
               "province_id":20,
               "name":"Kab. Bengkayang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":322,
               "province_id":20,
               "name":"Kab. Landak",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":323,
               "province_id":20,
               "name":"Kab. Sekadau",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":324,
               "province_id":20,
               "name":"Kab. Melawi",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":325,
               "province_id":20,
               "name":"Kab. Kayong Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":326,
               "province_id":20,
               "name":"Kab. Kubu Raya",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":327,
               "province_id":20,
               "name":"Kota Pontianak",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":328,
               "province_id":20,
               "name":"Kota Singkawang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":329,
               "province_id":21,
               "name":"Kab. Kotawaringin Barat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":330,
               "province_id":21,
               "name":"Kab. Kotawaringin Timur",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":331,
               "province_id":21,
               "name":"Kab. Kapuas",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":332,
               "province_id":21,
               "name":"Kab. Barito Selatan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":333,
               "province_id":21,
               "name":"Kab. Barito Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":334,
               "province_id":21,
               "name":"Kab. Katingan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":335,
               "province_id":21,
               "name":"Kab. Seruyan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":336,
               "province_id":21,
               "name":"Kab. Sukamara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":337,
               "province_id":21,
               "name":"Kab. Lamandau",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":338,
               "province_id":21,
               "name":"Kab. Gunung Mas",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":339,
               "province_id":21,
               "name":"Kab. Pulang Pisau",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":340,
               "province_id":21,
               "name":"Kab. Murung Raya",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":341,
               "province_id":21,
               "name":"Kab. Barito Timur",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":342,
               "province_id":21,
               "name":"Kota Palangka Raya",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":343,
               "province_id":22,
               "name":"Kab. Tanah Laut",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":344,
               "province_id":22,
               "name":"Kab. Kotabaru",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":345,
               "province_id":22,
               "name":"Kab. Banjar",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":346,
               "province_id":22,
               "name":"Kab. Barito Kuala",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":347,
               "province_id":22,
               "name":"Kab. Tapin",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":348,
               "province_id":22,
               "name":"Kab. Hulu Sungai Selatan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":349,
               "province_id":22,
               "name":"Kab. Hulu Sungai Tengah",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":350,
               "province_id":22,
               "name":"Kab. Hulu Sungai Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":351,
               "province_id":22,
               "name":"Kab. Tabalong",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":352,
               "province_id":22,
               "name":"Kab. Tanah Bumbu",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":353,
               "province_id":22,
               "name":"Kab. Balangan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":354,
               "province_id":22,
               "name":"Kota Banjarmasin",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":355,
               "province_id":22,
               "name":"Kota Banjarbaru",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":356,
               "province_id":23,
               "name":"Kab. Paser",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":357,
               "province_id":23,
               "name":"Kab. Kutai Kartanegara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":358,
               "province_id":23,
               "name":"Kab. Berau",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":359,
               "province_id":23,
               "name":"Kab. Kutai Barat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":360,
               "province_id":23,
               "name":"Kab. Kutai Timur",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":361,
               "province_id":23,
               "name":"Kab. Penajam Paser Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":362,
               "province_id":23,
               "name":"Kab. Mahakam Ulu",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":363,
               "province_id":23,
               "name":"Kota Balikpapan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":364,
               "province_id":23,
               "name":"Kota Samarinda",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":365,
               "province_id":23,
               "name":"Kota Bontang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":366,
               "province_id":24,
               "name":"Kab. Bulungan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":367,
               "province_id":24,
               "name":"Kab. Malinau",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":368,
               "province_id":24,
               "name":"Kab. Nunukan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":369,
               "province_id":24,
               "name":"Kab. Tana Tidung",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":370,
               "province_id":24,
               "name":"Kota Tarakan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":371,
               "province_id":25,
               "name":"Kab. Bolaang Mongondow",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":372,
               "province_id":25,
               "name":"Kab. Minahasa",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":373,
               "province_id":25,
               "name":"Kab. Kepulauan Sangihe",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":374,
               "province_id":25,
               "name":"Kab. Kepulauan Talaud",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":375,
               "province_id":25,
               "name":"Kab. Minahasa Selatan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":376,
               "province_id":25,
               "name":"Kab. Minahasa Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":377,
               "province_id":25,
               "name":"Kab. Minahasa Tenggara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":378,
               "province_id":25,
               "name":"Kab. Bolaang Mongondow Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":379,
               "province_id":25,
               "name":"Kab. Kepulauan Siau Tagulandang Biaro",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":380,
               "province_id":25,
               "name":"Kab. Bolaang Mongondow Timur",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":381,
               "province_id":25,
               "name":"Kab. Bolaang Mongondow Selatan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":382,
               "province_id":25,
               "name":"Kota Manado",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":383,
               "province_id":25,
               "name":"Kota Bitung",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":384,
               "province_id":25,
               "name":"Kota Tomohon",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":385,
               "province_id":25,
               "name":"Kota Kotamobagu",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":386,
               "province_id":26,
               "name":"Kab. Banggai",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":387,
               "province_id":26,
               "name":"Kab. Poso",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":388,
               "province_id":26,
               "name":"Kab. Donggala",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":389,
               "province_id":26,
               "name":"Kab. Toli-Toli",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":390,
               "province_id":26,
               "name":"Kab. Buol",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":391,
               "province_id":26,
               "name":"Kab. Morowali",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":392,
               "province_id":26,
               "name":"Kab. Banggai Kepulauan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":393,
               "province_id":26,
               "name":"Kab. Parigi Moutong",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":394,
               "province_id":26,
               "name":"Kab. Tojo Una-Una",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":395,
               "province_id":26,
               "name":"Kab. Sigi",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":396,
               "province_id":26,
               "name":"Kab. Banggai Laut",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":397,
               "province_id":26,
               "name":"Kab. Morowali Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":398,
               "province_id":26,
               "name":"Kota Palu",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":399,
               "province_id":27,
               "name":"Kab. Kepulauan Selayar",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":400,
               "province_id":27,
               "name":"Kab. Bulukumba",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":401,
               "province_id":27,
               "name":"Kab. Bantaeng",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":402,
               "province_id":27,
               "name":"Kab. Jeneponto",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":403,
               "province_id":27,
               "name":"Kab. Takalar",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":404,
               "province_id":27,
               "name":"Kab. Gowa",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":405,
               "province_id":27,
               "name":"Kab. Sinjai",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":406,
               "province_id":27,
               "name":"Kab. Bone",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":407,
               "province_id":27,
               "name":"Kab. Maros",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":408,
               "province_id":27,
               "name":"Kab. Pangkajene Kepulauan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":409,
               "province_id":27,
               "name":"Kab. Barru",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":410,
               "province_id":27,
               "name":"Kab. Soppeng",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":411,
               "province_id":27,
               "name":"Kab. Wajo",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":412,
               "province_id":27,
               "name":"Kab. Sidenreng Rappang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":413,
               "province_id":27,
               "name":"Kab. Pinrang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":414,
               "province_id":27,
               "name":"Kab. Enrekang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":415,
               "province_id":27,
               "name":"Kab. Luwu",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":416,
               "province_id":27,
               "name":"Kab. Tana Toraja",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":417,
               "province_id":27,
               "name":"Kab. Luwu Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":418,
               "province_id":27,
               "name":"Kab. Luwu Timur",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":419,
               "province_id":27,
               "name":"Kab. Toraja Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":420,
               "province_id":27,
               "name":"Kota Makassar",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":421,
               "province_id":27,
               "name":"Kota Parepare",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":422,
               "province_id":27,
               "name":"Kota Palopo",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":423,
               "province_id":28,
               "name":"Kab. Kolaka",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":424,
               "province_id":28,
               "name":"Kab. Konawe",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":425,
               "province_id":28,
               "name":"Kab. Muna",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":426,
               "province_id":28,
               "name":"Kab. Buton",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":427,
               "province_id":28,
               "name":"Kab. Konawe Selatan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":428,
               "province_id":28,
               "name":"Kab. Bombana",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":429,
               "province_id":28,
               "name":"Kab. Wakatobi",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":430,
               "province_id":28,
               "name":"Kab. Kolaka Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":431,
               "province_id":28,
               "name":"Kab. Konawe Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":432,
               "province_id":28,
               "name":"Kab. Buton Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":433,
               "province_id":28,
               "name":"Kab. Kolaka Timur",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":434,
               "province_id":28,
               "name":"Kab. Konawe Kepulauan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":435,
               "province_id":28,
               "name":"Kab. Muna Barat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":436,
               "province_id":28,
               "name":"Kab. Buton Tengah",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":437,
               "province_id":28,
               "name":"Kab. Buton Selatan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":438,
               "province_id":28,
               "name":"Kota Kendari",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":439,
               "province_id":28,
               "name":"Kota Bau-Bau",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":440,
               "province_id":29,
               "name":"Kab. Gorontalo",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":441,
               "province_id":29,
               "name":"Kab. Boalemo",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":442,
               "province_id":29,
               "name":"Kab. Bone Bolango",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":443,
               "province_id":29,
               "name":"Kab. Pohuwato",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":444,
               "province_id":29,
               "name":"Kab. Gorontalo Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":445,
               "province_id":29,
               "name":"Kota Gorontalo",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":446,
               "province_id":30,
               "name":"Kab. Mamuju Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":447,
               "province_id":30,
               "name":"Kab. Mamuju",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":448,
               "province_id":30,
               "name":"Kab. Mamasa",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":449,
               "province_id":30,
               "name":"Kab. Polewali Mandar",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":450,
               "province_id":30,
               "name":"Kab. Majene",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":451,
               "province_id":30,
               "name":"Kab. Mamuju Tengah",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":452,
               "province_id":31,
               "name":"Kab. Maluku Tengah",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":453,
               "province_id":31,
               "name":"Kab. Maluku Tenggara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":454,
               "province_id":31,
               "name":"Kab. Maluku Tenggara Barat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":455,
               "province_id":31,
               "name":"Kab. Buru",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":456,
               "province_id":31,
               "name":"Kab. Seram Bagian Timur",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":457,
               "province_id":31,
               "name":"Kab. Seram Bagian Barat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":458,
               "province_id":31,
               "name":"Kab. Kepulauan Aru",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":459,
               "province_id":31,
               "name":"Kab. Maluku Barat Daya",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":460,
               "province_id":31,
               "name":"Kab. Buru Selatan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":461,
               "province_id":31,
               "name":"Kota Ambon",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":462,
               "province_id":31,
               "name":"Kota Tual",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":463,
               "province_id":32,
               "name":"Kab. Halmahera Barat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":464,
               "province_id":32,
               "name":"Kab. Halmahera Tengah",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":465,
               "province_id":32,
               "name":"Kab. Halmahera Utara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":466,
               "province_id":32,
               "name":"Kab. Halmahera Selatan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":467,
               "province_id":32,
               "name":"Kab. Kepulauan Sula",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":468,
               "province_id":32,
               "name":"Kab. Halmahera Timur",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":469,
               "province_id":32,
               "name":"Kab. Pulau Morotai",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":470,
               "province_id":32,
               "name":"Kab. Pulau Taliabu",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":471,
               "province_id":32,
               "name":"Kota Ternate",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":472,
               "province_id":32,
               "name":"Kota Tidore Kepulauan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":473,
               "province_id":33,
               "name":"Kab. Merauke",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":474,
               "province_id":33,
               "name":"Kab. Jayawijaya",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":475,
               "province_id":33,
               "name":"Kab. Jayapura",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":476,
               "province_id":33,
               "name":"Kab. Nabire",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":477,
               "province_id":33,
               "name":"Kab. Kepulauan Yapen",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":478,
               "province_id":33,
               "name":"Kab. Biak Numfor",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":479,
               "province_id":33,
               "name":"Kab. Puncak Jaya",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":480,
               "province_id":33,
               "name":"Kab. Paniai",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":481,
               "province_id":33,
               "name":"Kab. Mimika",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":482,
               "province_id":33,
               "name":"Kab. Sarmi",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":483,
               "province_id":33,
               "name":"Kab. Keerom",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":484,
               "province_id":33,
               "name":"Kab. Pegunungan Bintang",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":485,
               "province_id":33,
               "name":"Kab. Yahukimo",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":486,
               "province_id":33,
               "name":"Kab. Tolikara",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":487,
               "province_id":33,
               "name":"Kab. Waropen",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":488,
               "province_id":33,
               "name":"Kab. Boven Digoel",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":489,
               "province_id":33,
               "name":"Kab. Mappi",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":490,
               "province_id":33,
               "name":"Kab. Asmat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":491,
               "province_id":33,
               "name":"Kab. Supiori",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":492,
               "province_id":33,
               "name":"Kab. Mamberamo Raya",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":493,
               "province_id":33,
               "name":"Kab. Mamberamo Tengah",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":494,
               "province_id":33,
               "name":"Kab. Yalimo",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":495,
               "province_id":33,
               "name":"Kab. Lanny Jaya",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":496,
               "province_id":33,
               "name":"Kab. Nduga",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":497,
               "province_id":33,
               "name":"Kab. Puncak",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":498,
               "province_id":33,
               "name":"Kab. Dogiyai",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":499,
               "province_id":33,
               "name":"Kab. Intan Jaya",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":500,
               "province_id":33,
               "name":"Kab. Deiyai",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":501,
               "province_id":33,
               "name":"Kota Jayapura",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":502,
               "province_id":34,
               "name":"Kab. Sorong",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":503,
               "province_id":34,
               "name":"Kab. Manokwari",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":504,
               "province_id":34,
               "name":"Kab. Fakfak",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":505,
               "province_id":34,
               "name":"Kab. Sorong Selatan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":506,
               "province_id":34,
               "name":"Kab. Raja Ampat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":507,
               "province_id":34,
               "name":"Kab. Teluk Bintuni",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":508,
               "province_id":34,
               "name":"Kab. Teluk Wondama",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":509,
               "province_id":34,
               "name":"Kab. Kaimana",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":510,
               "province_id":34,
               "name":"Kab. Tambrauw",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":511,
               "province_id":34,
               "name":"Kab. Maybrat",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":512,
               "province_id":34,
               "name":"Kab. Manokwari Selatan",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":513,
               "province_id":34,
               "name":"Kab. Pegunungan Arfak",
               "created_at":null,
               "updated_at":null
            },
            {
               "id":514,
               "province_id":34,
               "name":"Kota Sorong",
               "created_at":null,
               "updated_at":null
            }
         ]';
        $data = json_decode($json, true);
        RefCity::insert($data);
    }
}
