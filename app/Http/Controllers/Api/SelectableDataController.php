<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SelectableDataResource;
use App\Models\CarBrand;
use App\Models\CarType;
use App\Models\Cities\Wilaya;
use App\Models\PartCategory;
use App\Models\PartSubCategory;
use App\Models\UserProfession;
use App\Models\UserStatus;
use Illuminate\Http\Request;
use LucasDotVin\Soulbscription\Models\Plan;

class SelectableDataController extends Controller
{
    /**Cars && parts**/
    function getCarType()
    {
        return SelectableDataResource::collection(CarType::all());
    }
    function getCarBrands() {
        return SelectableDataResource::collection(CarBrand::all());
    }
    function getPartCategories() {
        return SelectableDataResource::collection(PartCategory::all());
    }
    function getPartSubCategories() {
        return SelectableDataResource::collection(PartSubCategory::all());
    }
    /**Users options**/
    function getUserProfessions() {
        return SelectableDataResource::collection(UserProfession::all());
    }
    function getUserStatuses() {
        return SelectableDataResource::collection(UserStatus::all());
    }
    function getPlans() {
        return SelectableDataResource::collection(Plan::all());
    }
    /**Others**/
    function getWilayas() {
        return SelectableDataResource::collection(Wilaya::all());
    }
}
