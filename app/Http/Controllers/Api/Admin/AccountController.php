<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    function getNotifications(Request $request)
    {
        $params = $request->query();
        $pageNumber = $params['page'] ?? 0;
        $perPage = $params['perPage'] ?? 10;
        $allNotifications = Auth::user()->notifications()->offset($pageNumber * $perPage)->limit($perPage)->get();
        $totalUnreadNotifications = Auth::user()->unreadNotifications->count();
        return response()->json([
            'notifications' => $allNotifications,
            'totalUnreadNotifications' => $totalUnreadNotifications
        ]);
    }
}
