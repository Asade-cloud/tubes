<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MerekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mereks')->insert([
            [
                'nama_merek' => 'Samsung',
            ],
            [
                'nama_merek' => 'LG',
            ],
            [
                'nama_merek' => 'Sharp',
            ],
        ]);
    }
}
