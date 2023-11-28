<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use LucasDotVin\Soulbscription\Models\Plan;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
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
                'guard_name'=>'web',
            ]);
        }
        // Subscription dates
        $maxDate = now()->timestamp;
        $minDate = now()->subDays(21)->timestamp;
        /***/
        $role_pro = Role::create([
            'name'=>'pro-user',
            'guard_name'=>'web',
        ])->syncPermissions(Permission::where('guard_name', 'web')->get());
        $role_basic = Role::create([
            'name'=>'basic-user',
            'guard_name'=>'web',
        ])->syncPermissions(Permission::where('guard_name', 'web')->get());
        /***/
        $ilyas = User::create([
            'name'=>'ilyas',
            'phone'=>'+213793722937',
            'email'=>'ilyas@gmail.com',
            'user_invitation_code'=>'12345',
            'wilaya_id' => random_int(1,58),
            'user_profession_id' => random_int(1,3),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        $ilyas->assignRole($role_pro);
        $plan = Plan::find(random_int(1,6));
        // Generate a random timestamp between the start and end dates
        $subscriptionDate = Carbon::createFromTimestamp(mt_rand($minDate, $maxDate));
        $ilyas->subscribeTo($plan, startDate: $subscriptionDate);
        /****/
        $user = User::create([
            'name'=>'user',
            'phone'=>'+213659073357',
            'email'=>'user@gmail.com',
            'user_invitation_code'=>'24500',
            'wilaya_id' => random_int(1,58),
            'user_profession_id' => random_int(1,3),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        $user->assignRole($role_basic);
        $plan = Plan::find(random_int(1,6));
        // Generate a random timestamp between the start and end dates
        $subscriptionDate = Carbon::createFromTimestamp(mt_rand($minDate, $maxDate));
        $user->subscribeTo($plan, startDate: $subscriptionDate);
        /****/
        foreach (User::all() as $key => $user) {
            $user->part_categories()->attach([1]);
            $user->part_sub_categories()->attach([1]);
            $user->parts()->attach([1]);
            $user->car_brands()->attach([1]);
            $user->car_types()->attach([1]);
            $user->car_models()->attach([1]);
            $user->part_brands()->attach([1]);
            $user->profile()->create([
                'user_id' => $user->id,
                'phone'   => $user->phone
            ]);
        }
    }
}
