<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sekolah')->insert([
            [
                'npsn'           => '20209569',
                'nama_sekolah'   => 'SDN 1 Pakuwon',
                'tingkat'        => 'SD',
                'alamat_sekolah' => 'Jl. Veteran No. 8, Kel. Pakuwon, Kec. Garut Kota, Kab. Garut',
                'foto_sekolah'   => 'uploads/sekolah/sdn1.jpg',
                'dapur_sppg_id'  => 4,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'npsn'           => '20209254',
                'nama_sekolah'   => 'SMPN 2 Tarogong Kaler',
                'tingkat'        => 'SMP',
                'alamat_sekolah' => 'Jl. Raya Samarang No. 115, Kec. Tarogong Kaler, Kab. Garut',
                'foto_sekolah'   => 'uploads/sekolah/smpn2.jpg',
                'dapur_sppg_id'  => 3,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'npsn'           => '20209241',
                'nama_sekolah'   => 'SMAN 10 Garut',
                'tingkat'        => 'SMA',
                'alamat_sekolah' => 'Jl. KH. Hasan Arif, Sukamukti, Kec. Banyuresmi, Kab. Garut',
                'foto_sekolah'   => 'uploads/sekolah/sman3.jpg',
                'dapur_sppg_id'  => 2,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
            [
                'npsn'           => '20209220',
                'nama_sekolah'   => 'SMKN 1 Garut',
                'tingkat'        => 'SMK',
                'alamat_sekolah' => 'Jl. Cimanuk No. 309, Pataruman, Kec. Tarogong Kidul, Kab. Garut',
                'foto_sekolah'   => 'uploads/sekolah/smkn4.jpg',
                'dapur_sppg_id'  => 1,
                'created_at'     => now(),
                'updated_at'     => now(),
            ],
        ]);
    }
}