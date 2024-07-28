<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return view('profile.index');
    }

    public function update(UserUpdateRequest $request)
    {

        /**
         * @var \App\Models\User $user
         */
        $user = auth()->user();
        $user->update($request->only('name', 'email', 'first_name', 'last_name', 'phone'));
        $user->save();



        return redirect()->route('profile')->with('success', 'Le profil a été mis à jour');
    }
}
