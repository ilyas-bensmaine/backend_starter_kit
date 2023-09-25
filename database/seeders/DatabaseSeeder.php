<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(WilayaSeeder::class);
        $this->call(StatusSeeder::class);           // Admin && User
        $this->call(AdminSeeder::class);
        $this->call(UserRoleSeeder::class);
        $this->call(UserProfessionsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CarBrandSeeder::class);
        $this->call(ModelesSeeder::class);
        $this->call(CatsSeeder::class);
        $this->call(PostTypeSeeder::class);
        $this->call(PostStatusSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(PostResponseSeeder::class);
        $this->call(CarTypeSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(TicketTemplateSeeder::class);
        $this->call(FaqSeeder::class);
        // \App\Models\Faq::factory(5)->create();
    }
}
