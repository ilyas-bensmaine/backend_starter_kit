<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faq::create([
            'question'              => 'Qui sont SafyAuto'.'?',
            'arabic_question'       => 'من هم SafyAuto'.'؟',
            'response'             => 'nous sommes un groupe de jeunes qui trouvent que vous, les propriétaires de magasins, avez un énorme problème pour fournir ou vendre des pièces. ',
            'arabic_response'      =>  'نحن مجموعة من الشباب الذين يجدون أن أصحاب المحلات يواجهون مشكلة كبيرة في توفير قطع الغيار أو بيعها.',
            'active'               => 1
        ]);

        Faq::create([
            'question'              => "qu'allez-vous faire à ce sujet".'?',
            'arabic_question'       => 'ماذا سنفعل في هذا الموضوع'.'؟',
            'response'             => "nous vous fournissons, à vous les propriétaires de magasins de pièces détachées ainsi qu'aux entreteneurs de voitures, une solution pour communiquer entre vous afin de trouver les pièces qui vous manquent dans vos magasins.",
            'arabic_response'      =>  'نوفر لكم ، أنتم أصحاب متاجر قطع الغيار وكذلك مصلحي السيارات ، حلاً للتواصل مع بعضكم البعض للعثور على قطع الغيار التي لا تملكونها في متاجركم.',
            'active'               => 1
        ]);

        Faq::create([
            'question'              => "Comment vous allez atteindre cet objectif".'?',
            'arabic_question'       => 'كيف سنحقق هذا الهدف'.'؟',
            'response'             => "En créant ce site web où vous pouvez facilement poster vos demandes et les autres vendeurs peuvent répondre s'ils peuvent fournir la pièce demandée, en retour vous pouvez répondre aux demandes des autres vendeurs afin d'obtenir plus de ventes.",
            'arabic_response'      =>  'من خلال إنشاء موقع الويب هذا حيث يمكنك بسهولة نشر طلباتك ويمكن للبائعين الآخرين الرد إذا كان بإمكانهم توفير القطع المطلوبة ، في المقابل يمكنك الرد على طلبات البائعين الآخرين من أجل الحصول على المزيد من المبيعات.',
            'active'               => 1
        ]);

        Faq::create([
            'question'              => "Comment pouvons-nous nous inscrire sur votre site Web".'?',
            'arabic_question'       => 'كيف يمكننا التسجيل على موقع الويب'.'؟',
            'response'             => "Vous pouvez vous inscrire en fournissant des informations sur votre entreprise et payer un abonnement mensuel ou annuel.",
            'arabic_response'      =>  'يمكنك التسجيل من خلال تقديم معلومات عن عملك ودفع اشتراك شهري أو سنوي.',
            'active'               => 1
        ]);
        // Faq::create([
        //     'question'              => "".'?',
        //     'arabic_question'       => ''.'?',
        //     'response'             => "",
        //     'arabic_response'      =>  '',
        //     'active'               => 1
        // ]);
    }
}
