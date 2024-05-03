<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('satuans')->insert([
            [
            'code' => 'T',
            'name' => 'Ton',
            'description' => 'Ton'
            ],
            [
            'code' => 'Y',
            'name' => 'Yon',
            'description' => 'Yon'
            ],
           
            ]);
    }
}
