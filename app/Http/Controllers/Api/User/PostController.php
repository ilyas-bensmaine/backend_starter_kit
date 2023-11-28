<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @param request should contain the number of the page
     * url     /api/posts?page={number of the page}&per_page={posts per page}
     */
    public function index(Request $request)
    {
        $user = User::find(1);
        // $user = Auth::user();
        $per_page = $request->query()['perPage'] ?? 10;
        $all_posts = $request->query()['all_posts'] ?? 'false';
        $posts = QueryBuilder::for(Post::class)
            ->allowedFilters([
                'title', 'content',
                AllowedFilter::exact('wilaya_id'),
                AllowedFilter::exact('user_id'),
                AllowedFilter::scope('part_categories', null, 'part_categories'),
                AllowedFilter::scope('part_sub_categories', null, 'part_sub_categories'),
                AllowedFilter::scope('parts', null, 'parts'),
                AllowedFilter::scope('car_types', null, 'car_types'),
                AllowedFilter::scope('car_brands', null, 'car_brans'),
                AllowedFilter::scope('car_models', null, 'car_models'),
                AllowedFilter::scope('price_between', null, 'price_between')
            ]) //sort
            ->allowedSorts('price', 'created_at')
            ->with(['wilaya', 'part_categories', 'part_sub_categories', 'parts','car_types' , 'car_brands', 'car_models'])
            // ->with(['part_categories:id', 'part_sub_categories:id', 'parts:id', 'car_brands:id', 'car_models:id'])
            ->withCount(['viewers', 'savers', 'post_responses'])
            ->where('post_status_id', 1);
        if ($all_posts == 'true') //if the user wants to see all the posts
        {
            $posts = $posts->paginate($per_page);
            $posts->map(function ($post) {
                $post->getMedia('post_img');
                $post['saved'] = $post->savers->contains( Auth::user());
                $post['responded'] = $post->responders->contains( Auth::user());
                return $post;
            });
            return response()->json(
                $posts,
                200
            );
        }
        //else if he wants to see only the relevant onses
        $posts = $posts->get();
        $user_interrests = UserController::user_interrests($user);
        $relevent_posts = $posts->filter(
            function ($post) use ($user_interrests) {
                return
                    $post->part_categories->pluck('id')->intersect($user_interrests['user_part_categories'])->isNotEmpty()
                    ||
                    $post->part_sub_categories->pluck('id')->intersect($user_interrests['user_part_sub_categories'])->isNotEmpty()
                    ||
                    $post->parts->pluck('id')->intersect($user_interrests['user_parts'])->isNotEmpty()
                    ||
                    $post->car_brands->pluck('id')->intersect($user_interrests['user_part_brands'])->isNotEmpty()
                    ||
                    $post->car_types->pluck('id')->intersect($user_interrests['user_car_brands'])->isNotEmpty()
                    ||
                    $post->car_models->pluck('id')->intersect($user_interrests['user_car_models'])->isNotEmpty()
                    ||
                    $post->part_brands->pluck('id')->intersect($user_interrests['user_car_types'])->isNotEmpty();
            }
        )->toQuery()->with(['part_categories', 'part_sub_categories', 'parts', 'car_brands', 'car_models'])
            ->withCount(['viewers', 'savers', 'post_responses'])
            ->paginate($per_page);
        return response()->json(
            $relevent_posts,
            200
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
