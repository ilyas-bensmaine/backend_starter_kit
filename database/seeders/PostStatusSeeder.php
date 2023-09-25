<?php

namespace Database\Seeders;

use App\Models\PostResponseStatus;
use App\Models\PostStatus;
use Illuminate\Database\Seeder;

class PostStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostStatus::create([
            'name' => 'Active',
            'color_tag' => 'light-success'
        ]);
        PostStatus::create([
            'name' => 'Inactive',
            'color_tag' => 'light-danger'
        ]);
        PostResponseStatus::create([
            'name' => 'Active',
            'color_tag' => 'light-success'
        ]);
        PostResponseStatus::create([
            'name' => 'Inactive',
            'color_tag' => 'light-danger'
        ]);
    }
}
