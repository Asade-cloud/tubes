<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            [
                'nama' => 'Bambang',
                'alamat' => 'Sidoarjo',
                'email' => 'Bambang@gmail.com',
                'telepon' => '081231231412',
            ],
            [
                'nama' => 'Falko',
                'alamat' => 'Surabaya',
                'email' => 'Falko@gmail.com',
                'telepon' => '0812312334',
            ],
            [
                'nama' => 'Alpeng',
                'alamat' => 'Ngawi',
                'email' => 'Peng@gmail.com',
                'telepon' => '08213213',
            ],

        ]);
    }
}
