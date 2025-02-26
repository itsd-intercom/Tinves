<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeederr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Role::create([
        //     'name' => 'admin',
        //     'email'=> 'admin@role.test',
        //     'username' => 'admin',
        //     'password' => bcrypt('12345678')
        // ]);
        Role::create([
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'user',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'manager',
            'guard_name' => 'web'
        ]);

    }
}