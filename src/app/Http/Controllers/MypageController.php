<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $items = $user->items;

        $purchases = $user->purchases()->with('item')->get();

        $profile = $user->profile;

    return view('mypage.index', compact('user', 'items', 'purchases', 'profile'));
    }
}
