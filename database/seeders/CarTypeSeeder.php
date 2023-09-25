<?php

namespace Database\Seeders;

use App\Models\CarType;
use Illuminate\Database\Seeder;

class CarTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarType::create([
            'name' => 'Lourd',
            'arabic_name'=> 'الوزن الثقيل'
        ]);
        CarType::create([
           'name' => 'Leger',
           'arabic_name'=> 'الوزن الخفيف'
        ]);
        CarType::create([
            'name' => 'Moto',
            'arabic_name'=> 'الدراجات النارية'
        ]);
        CarType::create([
            'name' => 'Transport',
            'arabic_name'=> 'الحـافلات'
        ]);
        CarType::create([
            'name' => 'Engin',
            'arabic_name'=> 'الأشغال العمومية'
        ]);
        CarType::create([
            'name' => 'Matériel agricole',
            'arabic_name'=> 'العتاد الفلاحي'
        ]);
    }
}
