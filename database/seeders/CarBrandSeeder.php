<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->loadData();
        $this->command->comment("Marques loaded");
    }
    protected function loadData()
    {
        $this->insertMarques();
    }

    protected function insertMarques()
    {
        // Load wilayas from json
        $marques_json = json_decode(file_get_contents(database_path('seeders/json/marques.json')));

        // Insert Wilayas
        $data = [];
        foreach ($marques_json as $marque) {
            $data[] = [
                "id"            =>   $marque->id,
                "name"          =>    $marque->name,
                "arabic_name"   =>   $marque->name,
                "logo"          =>   env('APP_URL').'/img/CarBrands/'.$marque->name.'.jpg',

            ];
        }
        DB::table('car_brands')->insert($data);
    }
}
