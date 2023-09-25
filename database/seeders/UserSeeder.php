<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'ilyas',
            'phone'=>'+213793722937',
            'email'=>'ilyas@gmail.com',
            'user_invitation_code'=>'12345',
            'wilaya_id' => random_int(1,58),
            'user_profession_id' => random_int(1,3),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        User::create([
            'name'=>'user',
            'phone'=>'+213659073357',
            'email'=>'user@gmail.com',
            'user_invitation_code'=>'24500',
            'wilaya_id' => random_int(1,58),
            'user_profession_id' => random_int(1,3),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        // \App\Models\User::factory(50)->create();


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
