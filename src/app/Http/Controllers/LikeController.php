<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store($item_id)
    {
        Like::firstOrcreate([
            'user_id' => Auth::id(),
            'item_id' => $item_id,
        ]);

        return redirect('/item/' . $item_id);
    }
}
