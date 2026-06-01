<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit');
        }
    public function update(Request $request)
    {
    $user = Auth::user();

    $user->update([
        'name' => $request->name,
    ]);

    Profile::updateOrCreate(
        ['user_id' => $user->id],
        [
            'postal_code' => $request->postal_code,
            'address' => $request->address,
            'building' => $request->building,
        ]
    );

    return redirect('/');
    }
}
