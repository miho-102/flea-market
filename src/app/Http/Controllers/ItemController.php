<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    public function index(Request $request)
    {
    if ($request->page === 'mylist') {
        if (Auth::check()) {
            $items = Auth::user()->likes()->with('item')->get()->pluck('item');
        } else {
            $items = collect();
        }
    } else {
        $items = Item::query()
            ->when(Auth::check(), function ($query) {
                $query->where('user_id', '!=', Auth::id());
            })
            ->get();
    }

        return view('items.index', compact('items'));
    }

    public function show($item_id)
    {
        $item = Item::with(['categories', 'comments.user', 'likes'])->findOrFail($item_id);

        return view('items.show', compact('item'));
        }
}
