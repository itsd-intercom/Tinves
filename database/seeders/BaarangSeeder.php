<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BaarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert ke table siswas
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 5; $i++) {
            DB::table('masterbarang')->insert([
                // 'id' => $faker->numberBetween('1', '50'),
                'nama' => $faker->name,
                'merk' => $faker->sentence,
                'jenis' => $faker->sentence,
                'ukuran' => $faker->sentence,
                // 'merk' => $faker->sentence,
            ]);
        }
    }
}