<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user() -> load(['educations' , 'experiences']),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request -> user() ; 
        $data = $request -> validated() ; 

        if($request -> hasFile('profile_photo')) {
            if($user -> profile_photo && $user -> profile_photo != 'default_profile.jpg' ) {
                Storage::disk('public') -> delete('profiles/' . $user -> profile_photo) ; 
            }

            $path = $request -> file('profile_photo') -> store('profiles' , 'public')  ;
            $data['profile_photo'] = basename($path) ;
        }

        if($request -> hasFile('cover_photo')) {
            if($user -> cover_photo && $user -> cover_photo != 'default_cover.png' ) {
                Storage::disk('public') -> delete('covers/' . $user -> cover_photo) ;
            }

            $path = $request-> file('cover_photo') -> store('covers' , 'public') ;
            $data['cover_photo'] = basename($path) ; 
        }

        // $request->user()->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $request->user()->update($data) ;

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
