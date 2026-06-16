<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
        public function create($item_id)
    {
        $item = Item::findOrFail($item_id);

        return view('purchase.create', compact('item'));
    }

        public function store($item_id)
    {
        $item = Item::findOrFail($item_id);

        Purchase::create([
            'user_id' => Auth::id(),
            'item_id' => $item->id,
            'payment_method' => 'コンビニ払い',
            'postal_code' => '000-0000',
            'address' => 'テスト住所',
            'building' => null,
        ]);

        $item->update([
            'is_sold' => true,
        ]);

        return redirect('/');
    }
}
