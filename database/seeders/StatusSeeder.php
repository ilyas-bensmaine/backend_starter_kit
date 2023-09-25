<?php

namespace Database\Seeders;

use App\Models\AdminStatus;
use App\Models\UserStatus;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminStatus::create([
            'name'=>'active',
            'arabic_name'=>'مفعل',
        ]);
        AdminStatus::create([
            'name'=>'inactive',
            'arabic_name'=>'غير مفعل',
        ]);
        AdminStatus::create([
            'name'=>'en attendant',
            'arabic_name'=>'موقف مؤقتا',
        ]);
        UserStatus::create([
            'name'=>'active',
            'arabic_name'=>'مفعل',
        ]);
        UserStatus::create([
            'name'=>'inactive',
            'arabic_name'=>'غير مفعل',
        ]);
        UserStatus::create([
            'name'=>'en attendant',
            'arabic_name'=>'موقف مؤقتا',
        ]);
    }
}
