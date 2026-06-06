<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();

        $profile = Profile::firstOrCreate(
        ['user_id' => $user->id]
        );
        return view('profile.edit', compact('user', 'profile'));
        }

        public function update(Request $request)
        {
            $user = Auth::user();
            $user->update([
                'name' => $request->name,
                ]);

                $imagePath = null;
                if ($request->hasFile('image')) {
                    $imagePath = $request->file('image')->store('profiles', 'public');
                    }

                    $profileData = [
                        'postal_code' => $request->postal_code,
                        'address' => $request->address,
                        'building' => $request->building,
                        ];

                        if ($imagePath) {
                            $profileData['image'] = $imagePath;
                            }

                            Profile::updateOrCreate(
                                ['user_id' => $user->id],
                                $profileData
                                );

                                return redirect('/mypage/profile');
                                }
}
