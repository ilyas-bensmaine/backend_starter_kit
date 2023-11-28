<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostResponse;
use App\Models\User;
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
        $this->call(PlanSeeder::class);
        $this->call(WilayaSeeder::class);
        $this->call(StatusSeeder::class);           // Admin && User
        $this->call(AdminSeeder::class);
        $this->call(UserProfessionsSeeder::class);
        $this->call(UserSeeder::class);
        User::factory(8)->create();
        $this->call(CarBrandSeeder::class);
        $this->call(ModelesSeeder::class);
        $this->call(CatsSeeder::class);
        $this->call(PostTypeSeeder::class);
        $this->call(PostStatusSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(PostResponseSeeder::class);
        $this->call(CarTypeSeeder::class);
        $this->call(TicketTemplateSeeder::class);
        $this->call(FaqSeeder::class);
    }
}
