<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use LucasDotVin\Soulbscription\Enums\PeriodicityType;
use LucasDotVin\Soulbscription\Models\Feature;
use LucasDotVin\Soulbscription\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //    Features
        $postedDemandes = Feature::create([
            'consumable'                      => true,
            'name'                            => 'posted-demandes',
            'description'                     => 'Nombre de demandes',
            'arabic_description'              => 'عدد الطلبات ',
            'periodicity_type' => PeriodicityType::Month,
            'periodicity'      => 1,
        ]);

        $respondedDemandes = Feature::create([
            'consumable'       => true,
            'name'             => 'posted-responses',
            'description'             => 'Nombre de reponses',
            'arabic_description'             => 'عدد العروض ',
            'periodicity_type' => PeriodicityType::Month,
            'periodicity'      => 1,
        ]);

        $seePrices = Feature::create([
            'consumable' => false,
            'name'       => 'see-prices',
            'description'             => 'Visualiser les prix des concurants',
            'arabic_description'             => 'إظهار أسعار العروض المنافسة',
        ]);
        $themes = Feature::create([
            'consumable' => false,
            'name'       => 'themes',
            'description'             => 'Theme personalisé',
            'arabic_description'             => 'ديكور مميز',
        ]);

        $illumited_postedDemandes = Feature::create([
            'consumable' => false,
            'name'       => 'illumited-posted-demandes',
            'description'             => 'Demandes illimitées',
            'arabic_description'             => 'طلبات غير محدودة',
        ]);
        $illumited_respondedDemandes = Feature::create([
            'consumable' => false,
            'name'       => 'illumited-responded-demandes',
            'description'             => 'Reponses illimitées',
            'arabic_description'             => 'عروض غير محدودة',
        ]);


        //plans
        $gold = Plan::create([
            'name'             => 'gold',
            'arabic_name'      => 'ذهبي',
            'description'             => 'Plan pour les professionels',
            'arabic_description'             => 'ممتاز للمحترفين',
            'tag_color'        => 'light-warning',
            'periodicity_type' => PeriodicityType::Month,
            'periodicity'      => 2,
            'grace_days'       => 7,
            'price'       => 11900,
        ]);

        $gold->features()->attach($illumited_postedDemandes);
        $gold->features()->attach($illumited_respondedDemandes);
        $gold->features()->attach($seePrices);
        $gold->features()->attach($themes);

        $silver = Plan::create([
            'name'             => 'silver',
            'arabic_name'      => 'فضي',
            'description'             => 'Plan pour les intermédiaires',
            'arabic_description'             => 'للأعمال المتوسطة',
            'tag_color'        => 'light-info',
            'periodicity_type' => PeriodicityType::Month,
            'periodicity'      => 2,
            'grace_days'       => 7,
            'price'       => 9900,
        ]);
        $silver->features()->attach($postedDemandes, ['charges' => 150]);
        $silver->features()->attach($respondedDemandes, ['charges' => 250]);

        $bronze = Plan::create([
            'name'             => 'bronze',
            'arabic_name'      => 'برونزي',
            'description'             => 'Plan pour les débutants',
            'arabic_description'             => 'للمبتدئين',
            'tag_color'        => 'light-secondary',
            'periodicity_type' => PeriodicityType::Month,
            'periodicity'      => 2,
            'grace_days'       => 7,
            'price'       => 5900,
        ]);
        $bronze->features()->attach($postedDemandes, ['charges' => 100]);
        $bronze->features()->attach($respondedDemandes, ['charges' => 150]);

        //yearly
        $gold = Plan::create([
            'name'             => 'gold',
            'arabic_name'      => 'ذهبي',
            'description'             => 'Plan pour les professionels',
            'arabic_description'             => 'ممتاز للمحترفين',
            'tag_color'        => 'warning',
            'periodicity_type' => PeriodicityType::Year,
            'periodicity'      => 1,
            'grace_days'       => 7,
            'price'       => 100000,
        ]);

        $gold->features()->attach($illumited_postedDemandes);
        $gold->features()->attach($illumited_respondedDemandes);
        $gold->features()->attach($seePrices);
        $gold->features()->attach($themes);

        $silver = Plan::create([
            'name'             => 'silver',
            'arabic_name'      => 'فضي',
            'periodicity_type' => PeriodicityType::Year,
            'description'             => 'Plan pour les intermédiaires',
            'arabic_description'             => 'للأعمال المتوسطة',
            'tag_color'        => 'info',
            'periodicity'      => 1,
            'grace_days'       => 7,
            'price'       => 79900,
        ]);
        $silver->features()->attach($postedDemandes, ['charges' => 150]);
        $silver->features()->attach($respondedDemandes, ['charges' => 250]);

        $bronze = Plan::create([
            'name'             => 'bronze',
            'arabic_name'      => 'برونزي',
            'periodicity_type' => PeriodicityType::Year,
            'description'             => 'Plan pour les débutants',
            'arabic_description'             =>'للمبتدئين',
            'tag_color'        => 'secondary',
            'periodicity'      => 1,
            'grace_days'       => 7,
            'price'       => 49900,
        ]);
        $bronze->features()->attach($postedDemandes, ['charges' => 100]);
        $bronze->features()->attach($respondedDemandes, ['charges' => 150]);
    }
}
