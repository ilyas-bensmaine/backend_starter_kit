<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WilayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wilayas_json = json_decode(file_get_contents(database_path('seeders/json/Wilayas.json')));

        // Insert Wilayas
        $data = [];
        foreach ($wilayas_json as $wilaya) {
            $data[] = [
                'id'          => $wilaya->id,
                'code'        => $wilaya->code,
                'name'        => $wilaya->name,
                'arabic_name' => $wilaya->arabic_name,
                'created_at'  => now(),
            ];
        }
        DB::table('wilayas')->insert($data);
    }
}
