<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $admin = User::create([
            'name' => 'admin',
            'username' => "1A0525",
            'email' => 'admin@gmail.com',
            'password' => "password",
            'status' => true,
        ]);

        $admin_role = Role::create(['name' => 'admin']);

        $admin->assignRole($admin_role);
    }
}
