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
            'tag_color' => 'light-success'
        ]);
        PostStatus::create([
            'name' => 'Inactive',
            'tag_color' => 'light-danger'
        ]);
        PostResponseStatus::create([
            'name' => 'Active',
            'tag_color' => 'light-success'
        ]);
        PostResponseStatus::create([
            'name' => 'Inactive',
            'tag_color' => 'light-danger'
        ]);
    }
}
