<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DapurSPPGSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('dapur_sppg')->insert([
            [
                'nama_dapur'  => 'Dapur SPPG Tarogong Kidul',
                'foto'        => 'uploads/dapur/dapur1.jpg',
                'alamat'      => 'Jl. Raya Garut-Tasikmalaya, Kec. Tarogong Kidul, Kab. Garut',
                'tgl_berdiri'  => '2025-01-14',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'nama_dapur'  => 'Dapur SPPG Banyuresmi',
                'foto'        => 'uploads/dapur/dapur2.jpg',
                'alamat'      => 'Jl. KH. Hasan Arif, Kec. Banyuresmi, Kab. Garut',
                'tgl_berdiri'  => '2025-02-10',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'nama_dapur'  => 'Dapur SPPG Tarogong Kaler',
                'foto'        => 'uploads/dapur/dapur3.jpg',
                'alamat'      => 'Jl. Otista No. 120, Kec. Tarogong Kaler, Kab. Garut',
                'tgl_berdiri'  => '2025-01-20',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'nama_dapur'  => 'Dapur SPPG Garut Kota',
                'foto'        => 'uploads/dapur/dapur4.jpg',
                'alamat'      => 'Jl. Veteran No. 45, Kel. Pakuwon, Kec. Garut Kota, Kab. Garut',
                'tgl_berdiri'  => '2025-01-15',
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ]);
    }
}