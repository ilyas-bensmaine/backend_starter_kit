<?php

namespace Database\Seeders;

use App\Models\PostResponse;
use Illuminate\Database\Seeder;

class PostResponseSeeder extends Seeder
{
    protected $model = PostResponse::class;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pathToFile = public_path('img/example2.png');
        PostResponse::factory(50)->create();
        foreach ( PostResponse::all() as  $response) {
            $response->addMedia($pathToFile)
                        ->preservingOriginal()
                        ->toMediaCollection('post_response_img');
        }
    }
}
