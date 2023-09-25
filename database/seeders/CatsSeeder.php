<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $path = database_path('seeders/sql/categories.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);
        $path = database_path('seeders/sql/subcategories.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);
        $path = database_path('seeders/sql/subcategory2s.sql');
        $sql = file_get_contents($path);
        DB::unprepared($sql);
    }
}
