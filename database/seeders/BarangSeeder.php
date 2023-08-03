<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barangs')->insert([
            [
                'kategori_id' => '1',
                'nama_barang' => 'CH-2000',
                'merek_id' => '2',
                'stok' => '0',
            ],
            [
                'kategori_id' => '2',
                'nama_barang' => 'Sh-1300',
                'merek_id' => '3',
                'stok' => '0',
            ],
            [
                'kategori_id' => '3',
                'nama_barang' => 'Smsg-2000',
                'merek_id' => '1',
                'stok' => '0',
            ],
        ]);
    }
}

