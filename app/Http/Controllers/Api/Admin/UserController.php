<?php

namespace App\Http\Controllers\Api\Admin;

use App\Filters\Admin\UserSearchTermFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Http\Resources\Admin\UserResource;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = QueryBuilder::for(User::class)
                            ->defaultSort('created_at')
                            ->allowedSorts('id', 'name', 'email','created_at')
                            ->allowedFilters([
                                AllowedFilter::custom('searchTerm', new UserSearchTermFilter),
                                AllowedFilter::exact('profession', 'user_profession_id'),
                                AllowedFilter::exact('status', 'user_status_id'),
                                AllowedFilter::exact('wilaya', 'wilaya_id'),
                                AllowedFilter::scope('plans', null, 'plans'),
                            ])
                            ->with([
                                'user_profession',
                                'user_status',
                                'wilaya',
                                'subscription.plan',
                            ])
                            ->paginate();

        return UserResource::collection($users);
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
    public function store(UserStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = User::create([
                "name" => $request->name,
                "arabic_name" => $request->arabic_name,
                "email" => $request->email,
                "phone" => $request->phone,
                "user_status_id" => $request->status["value"],
                "wilaya_id" => $request->wilaya["value"],
                "user_profession_id" => $request->profession["value"],
                "password" => Hash::make('password'),
            ]);
            DB::commit();
            return $user;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id)->load([
                    'user_profession',
                    'user_status',
                    'wilaya',
                    'subscription.plan.features',
                    ])->loadCount([
                        'posts',
                        'post_responses',
                    ]);
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id)->load([
            'user_profession',
            'user_status',
            'wilaya'
        ]);
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, string $id)
    {
        try {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            $user->update([
                "name" => $request->name,
                "arabic_name" => $request->arabic_name,
                "email" => $request->email,
                "phone" => $request->phone,
                "user_status_id" => $request->status["value"],
                "wilaya_id" => $request->wilaya["value"],
                "user_profession_id" => $request->profession["value"]
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            $user->delete();
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            throw $th;
        }
    }
}
