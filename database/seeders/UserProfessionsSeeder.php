<?php

namespace Database\Seeders;

use App\Models\UserProfession;
use Illuminate\Database\Seeder;

class UserProfessionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserProfession::create([
            "name" => 'Commerçant',
            "arabic_name" => 'تاجر',
            "description" => "Propriétaire d'un magasin de pièces détachées",
            "arabic_description" => "صاحب  محل بيع قطع غيار",
            "icon"=>"settings"
        ]);
        UserProfession::create([
            "name" => 'Artisanat',
            "arabic_name" => 'حرفي',
            "description" => 'tôlier, mécanicien ou éléctricien de vehicules',
            "arabic_description" => "ميكانيكي-كهربائي-مصلح هيكل",
            "icon"=>"tool"
        ]);
        UserProfession::create([
            "name" => 'Utilisateur',
            "arabic_name" => 'مستخدم',
            "description" => "simple propriétaire de voiture",
            "arabic_description" => "صاحب سيارة",
            "icon"=>"user"
        ]);
    }
}
