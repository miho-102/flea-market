<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PurchaseRequest;
use App\Http\Requests\AddressRequest;
use Stripe\Stripe;
use Stripe\Checkout\Session;

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

    public function store(PurchaseRequest $request, $item_id)
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

                Stripe::setApiKey(config('services.stripe.secret'));

                $checkoutSession = Session::create([
                    'payment_method_types' => ['card'],
                    'line_items' => [[
                        'price_data' => [
                            'currency' => 'jpy',
                            'product_data' => [
                                'name' => $item->name,
                                ],
                                'unit_amount' => $item->price,
                                ],
                                'quantity' => 1,
                                ]],
                                'mode' => 'payment',
                                'success_url' => url('/'),
                                'cancel_url' => url('/purchase/' . $item->id),
                                ]);
                                return redirect($checkoutSession->url);
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
