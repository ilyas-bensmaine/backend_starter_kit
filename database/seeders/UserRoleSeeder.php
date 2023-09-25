<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'=>'pro-user',
            'guard_name'=>'web',
        ]);
        Role::create([
            'name'=>'basic-user',
            'guard_name'=>'web',
        ]);
        Role::create([
            'name'=>'vip',
            'guard_name'=>'web',
        ]);
    }
}
