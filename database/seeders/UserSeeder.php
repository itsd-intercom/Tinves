<?php

namespace Database\Seeders;

use App\Models\User;
// use App\Http\Controllers\user;
use Illuminate\Database\Seeder;
use App\Models\User as ModelsUser;
use Faker\Provider\ar_EG\Person;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'divisi_id' => 1,
            'lokasi_id' => 1,
            'jabatan' => "umum",
            'password' => bcrypt('1'),
        ]);
        $admin->assignRole('admin');

        $IT = User::create([
            'name' => 'IT',
            'email' => 'IT@gmail.com',
            'username' => 'IT',
            'divisi_id' => 1,
            'lokasi_id' => 1,
            'jabatan' => "umum",
            'password' => bcrypt('1234'),
            // 'password_plain' => 1234
        ]);
        $IT->assignRole('admin');

        $user = User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'username' => 'user',
            'divisi_id' => 1,
            'lokasi_id' => 1,
            'jabatan' => "admin",
            'password' => bcrypt('1'),
        ]);
        $user->assignRole('user');
        
        $GA = User::create([
            'name' => 'GA',
            'email' => 'GA@gmail.com',
            'username' => 'harini rahmi',
            'divisi_id' => 1,
            'lokasi_id' => 1,
            'jabatan' => "admin",
            'password' => bcrypt('1'),
        ]);
        $GA->assignRole('admin');

        $permission = Permission::create(['name' => 'read role']);
        $permission = Permission::create(['name' => 'create role']);
        $permission = Permission::create(['name' => 'update role']);
        $permission = Permission::create(['name' => 'delete role']);
        Permission::create(['name' => 'read ga']);

        $IT->givePermissionTo(['read role','create role','update role','delete role','read ga',]);
        $admin->givePermissionTo(['read role','create role','update role','delete role','read ga']);

    }
}