<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function index()
    {

        $users = User::all();
        return view(
            'admin.dashboard',
            [
                'users' => $users
            ]
        );
    }


    // set avatars to users
    public function setAvatars()
    {
        $users = User::all();
        foreach ($users as $user) {

            if (!$user->getFirstMediaUrl('avatars')) {

                // URL encode the user's name to ensure it's safe for use in a URL
                $encodedName = urlencode($user->name);
                $url = 'https://ui-avatars.com/api/?background=random&name=' . $encodedName . '&color=fff&rounded=true';
                $slug = Str::slug($user->name);

                try {
                    $user
                        ->addMediaFromUrl($url)
                        ->usingFileName($slug . '-avatar.jpg')
                        ->toMediaCollection('avatars');
                } catch (\Spatie\MediaLibrary\MediaCollections\Exceptions\UnreachableUrl $e) {
                    // Handle the exception or log it if the URL is unreachable
                    Log::error("Failed to set avatar for user {$user->id}: " . $e->getMessage());
                }
            }
        }

        return back()->with('success', 'Les avatars ont été mis à jour avec succès');
    }
}
