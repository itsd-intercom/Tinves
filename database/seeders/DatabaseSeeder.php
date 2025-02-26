<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(RoleSeederr::class);
        $this->call(UserSeeder::class);
        $this->call(NamaBarangSeeder::class);
        $this->call(BaarangSeeder::class);


        // $this->call(notesSeeder::class);
        DB::table('divisi')->insert([
            'nama' => Str::random(10),
        ]);
        DB::table('lokasi')->insert([
            'nama' => Str::random(10),
        ]);
        DB::table('jenis')->insert([
            'nama' => Str::random(10),
        ]);

        DB::table('leasing')->insert([
            'nama' => 'TAF',
        ]);
        DB::table('leasing')->insert([
            'nama' => 'ACC',
        ]);
        DB::table('leasing')->insert([
            'nama' => 'BNI',
        ]);
        DB::table('leasing')->insert([
            'nama' => 'MAYBANK',
        ]);
    }
}
