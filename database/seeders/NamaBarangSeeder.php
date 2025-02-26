<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NamaBarangSeeder extends Seeder
{
    public function run()
    {
        // insert ke table siswas
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 50; $i++) {
            DB::table('inventoryga')->insert([
                'id' => $faker->numberBetween('1', '10000000'),
                'user_id' => $faker->numberBetween('1', '3'),
                'master_id' => $faker->numberBetween('1', '3'),
                'status' => $faker->name,
                'keterangan' => $faker->sentence,
                'tgl_pembelian' => date('Y-m-d H:i:s'),
                'usia_pemakaian' => $faker->numberBetween(10, 15),
            ]);
        }
    }
}