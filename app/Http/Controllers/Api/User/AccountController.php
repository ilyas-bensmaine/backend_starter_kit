<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

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
