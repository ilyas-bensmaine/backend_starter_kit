<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use DB;
use Exception;
use Hash;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Boolean;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $user = Auth::user();
        $user->load([
                'wilaya',
                'user_status',
                'part_categories',
                'car_brands',
                'car_types',
                'user_profession',
                'subscription'
            ]);
        return $user;
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
        DB::beginTransaction();
        try {
            $user = Auth::user();
            $request->has('name') ? $user->name = $request->name : null;
            $request->has('email') ? $user->email = $request->email : null;
            $request->has('phone') ? $user->phone = $request->phone : null;
            $request->has('wilaya') ? $user->wilaya_id = $request->wilaya : null;
            $request->has('profession') ? $user->user_profession_id = $request->profession : null;
            $request->has('car_types') ? $user->car_types()->sync([$request->car_types]) : null;
            $request->has('car_brands') ? $user->car_brands()->sync($request->car_brands) : null;
            $request->has('part_categories') ? $user->part_categories()->sync($request->part_categories) : null;
            $user->save();
            DB::commit();
            return response()->json($user->load([
                    'wilaya',
                    'user_status',
                    'part_categories',
                    'car_brands',
                    'car_types',
                    'user_profession',
                    'subscription',
                ])
            );
        } catch (Exception $e) {
            DB::rollBack();
            dd($e);
            return response($e->getMessage(), 477);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Check the unicity while registration
     */
    function registerValidation(Request $request, $step)
    {
        $this->validate($request, [
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|unique:users',
            'password' => 'sometimes|required',
            'confirmPassword' => 'sometimes|required|same:password',
            'phone' => 'sometimes|required|string|unique:users',
            'wilaya' => 'sometimes|required|array',
        ]);

        return;
    }
    function register(Request $request)
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                // 'phone'=>'+213659073357',
                'wilaya_id' => $request->wilaya['value'],
                'password' => Hash::make($request->password),
            ]);
            $user->profile()->create([
                'user_id' => $user->id,
                'phone'   => $request->phone
            ]);
            DB::commit();
            $this->guard->login($user);
            return response()->json($user);
        } catch (Exception $e) {
            DB::rollBack();
            return response($e->getMessage(), 477);
        }
    }
    public static function user_interrests($user)
    {

        $user_part_categories = $user->part_categories->pluck('id');
        $user_part_sub_categories = $user->part_sub_categories->pluck('id');
        $user_parts = $user->parts->pluck('id');
        $user_part_brands = $user->part_brands->pluck('id');
        $user_car_brands = $user->car_brands->pluck('id');
        $user_car_models = $user->car_models->pluck('id');
        $user_car_types = $user->car_types->pluck('id');

        $user_interrests = collect([
            'user_part_categories' => $user_part_categories,
            'user_part_sub_categories' => $user_part_sub_categories,
            'user_parts' => $user_parts,
            'user_part_brands' => $user_part_brands,
            'user_car_brands' => $user_car_brands,
            'user_car_models' => $user_car_models,
            'user_car_types' => $user_car_types,
        ]);
        return $user_interrests;
    }
}
