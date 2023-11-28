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
            'tag_color'=>'success'
        ]);
        AdminStatus::create([
            'name'=>'inactive',
            'arabic_name'=>'غير مفعل',
            'tag_color'=>'warning'
        ]);
        AdminStatus::create([
            'name'=>'en attendant',
            'arabic_name'=>'موقف مؤقتا',
            'tag_color'=>'danger'
        ]);
        UserStatus::create([
            'name'=>'active',
            'arabic_name'=>'مفعل',
            'tag_color'=>'success'
        ]);
        UserStatus::create([
            'name'=>'inactive',
            'arabic_name'=>'غير مفعل',
            'tag_color'=>'warning'
        ]);
        UserStatus::create([
            'name'=>'en attendant',
            'arabic_name'=>'موقف مؤقتا',
            'tag_color'=>'danger'
        ]);
    }
}
