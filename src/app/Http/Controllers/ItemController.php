<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExhibitionRequest;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class ItemController extends Controller
{
    public function index(Request $request)
    {
    if ($request->page === 'mylist') {
        if (Auth::check()) {
            $items = Auth::user()->likes()->with('item')->get()->pluck('item');

        if ($request->keyword) {
            $items = $items->filter(function ($item) use ($request) {
                return str_contains($item->name, $request->keyword);
                });
        }

        } else {
            $items = collect();
        }

        } else {
        $items = Item::query()
            ->when(Auth::check(), function ($query) {
                $query->where('user_id', '!=', Auth::id());
            })
            ->when($request->keyword, function ($query, $keyword) {
                $query->where('name', 'like', "%{$keyword}%");
                })
            ->get();
    }

        return view('items.index', compact('items'));
    }

    public function show($item_id)
    {
        $item = Item::with(['categories', 'comments.user', 'likes'])->findOrFail($item_id);

        $isLiked = false;
        if (Auth::check()) {
        $isLiked = $item->likes()
            ->where('user_id', Auth::id())
            ->exists();
            }
            return view('items.show', compact('item', 'isLiked'));
    }

    public function create()
    {
    $categories = Category::all();

    return view('items.create',compact('categories'));
    }

    public function store(ExhibitionRequest $request)
    {
    $imagePath = $request->file('image')->store('items', 'public');
    $item = Item::create([
        'user_id' => Auth::id(),
        'name' => $request->name,
        'brand_name' => $request->brand_name,
        'description' => $request->description,
        'price' => $request->price,
        'image' => $imagePath,
        'condition' => $request->condition,
        'is_sold' => false,
    ]);

    $item->categories()->attach($request->categories);

    return redirect('/');
    }
}
