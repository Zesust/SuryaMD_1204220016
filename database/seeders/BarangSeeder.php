<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barangs')->insert([
            [
            'kodeBarang' => 'SM',
            'namaBarang' => 'Surya Marlong',
            'deskripsiBarang'=> 'Surya Marloong',
            'hargaBarang' => 76000,
            'satuan_id' => 1
            ],
            [
                'kodeBarang' => 'IX',
                'namaBarang' => 'Invoke Xyone',
                'deskripsiBarang'=> 'Invoke Xyonnes',
                'hargaBarang' => 96000,
                'satuan_id' => 1
                ],
            ]);
    }
}
