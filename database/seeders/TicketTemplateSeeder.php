<?php

namespace Database\Seeders;

use App\Models\TicketTemplate;
use Illuminate\Database\Seeder;
use LucasDotVin\Soulbscription\Models\Feature;

class TicketTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features = Feature::all();
        $Starter =  TicketTemplate::create([
            'name' => 'Starter',
            'arabic_name' => 'مبتدئ',
            'price'  =>  2900,
        ]);
        $Starter->features()->attach(
            $features[0],
            ['charges' => 20]
        );
        $Starter->features()->attach(
            $features[1],
            ['charges' => 20]
        );

        $intermidiate = TicketTemplate::create([
            'name' => 'Intermidiate',
            'arabic_name' => 'متمرس',
            'price'  =>  3900,
        ]);
        $intermidiate->features()->attach(
            $features[0],
            ['charges' => 50]
        );
        $intermidiate->features()->attach(
            $features[1],
            ['charges' => 50]
        );
        $pro = TicketTemplate::create([
            'name' => 'Professionnel',
            'arabic_name' => 'محترف',
            'price'  =>  5900,
        ]);
        $pro->features()->attach(
            $features[0],
            ['charges' => 100]
        );
        $pro->features()->attach(
            $features[1],
            ['charges' => 100]
        );
    }
}
