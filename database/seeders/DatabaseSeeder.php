<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $permission_1 = Permission::create(['name' => 'home@list']);
        $role_1 = Role::create([
            'name' => 'simple user'
        ]);
        $role_1->syncPermissions([$permission_1]);
        //***/
        $permission_1 = Permission::create([
            'name' => 'home@list',
            'guard_name'=> 'admin'
        ]);
        $permission_2 = Permission::create([
            'name' => 'secondPage@list',
            'guard_name'=> 'admin'
        ]);
        $role_2 = Role::create([
            'name' => 'super admin',
            'guard_name'=> 'admin'
        ]);
        $role_2->syncPermissions([$permission_1, $permission_2]);
        // $permission_1->assignRole($role_2);
        // $permission_2->assignRole($role_2);

        User::create([
            'name' => 'Test User',
            'email' => 'user@gmail.com',
            'language' => 'fr',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole($role_1);
        Admin::create([
            'name' => 'Test Admin',
            'email' => 'admin@gmail.com',
            'language'=> 'fr',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole($role_2);
    }
}
