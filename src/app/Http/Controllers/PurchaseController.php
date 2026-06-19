<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PurchaseRequest;
use App\Http\Requests\AddressRequest;

class PurchaseController extends Controller
{
    public function create($item_id)
    {
        $item = Item::findOrFail($item_id);

        $profile = Auth::user()->profile;

        if (!$profile) {
        return redirect('/mypage/profile');
        }

        return view('purchase.create', compact('item', 'profile'));
    }
    public function store(PurchaseRequest $request,$item_id)
    {
        $item = Item::findOrFail($item_id);

        $profile = Auth::user()->profile;

        Purchase::create([
            'user_id' => Auth::id(),
            'item_id' => $item->id,
            'payment_method' => $request->payment_method,
            'postal_code' => $profile->postal_code,
            'address' => $profile->address,
            'building' => $profile->building,
        ]);

        $item->update([
            'is_sold' => true,
        ]);

        return redirect('/');
    }

    public function editAddress($item_id)
    {
        $item = Item::findOrFail($item_id);
        $profile = Auth::user()->profile;

        return view('purchase.address', compact('item', 'profile'));
    }

    public function updateAddress(AddressRequest $request, $item_id)
    {
        $profile = Auth::user()->profile;
        $profile->update([
        'postal_code' => $request->postal_code,
        'address' => $request->address,
        'building' => $request->building,
        ]);

    return redirect('/purchase/' . $item_id);
    }
}
