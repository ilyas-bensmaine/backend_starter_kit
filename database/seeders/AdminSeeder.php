<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert permissions
        $models_json = json_decode(file_get_contents(database_path('seeders/json/admin_permissions.json')));
        foreach ($models_json as $model) {
            Permission::create([
                'name'=> $model->name,
                'guard_name'=>'admin',
            ]);
        }
        // Insert roles
        $role = Role::create([
            'name'=>'super-admin',
            'guard_name'=>'admin',
        ])->syncPermissions(Permission::all());
        Role::create([
            'name'=>'basic-admin',
            'guard_name'=>'admin',
        ])->syncPermissions(Permission::all());
        Role::create([
            'name'=>'manger',
            'guard_name'=>'admin',
        ])->syncPermissions(Permission::all());
        // Insert admins
        $admin = Admin::create([
            'name'=>'admin',
            'username'=>'admin',
            'email'=>'admin@gmail.com',
            'phone'=>'0659403798',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $admin->assignRole($role);
    }
}
