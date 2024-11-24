<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::with('detail_information')->findOrFail($id);

        return view('profiles.show', compact('user'));
    }
    public function edit($id): View
    {
        $user = User::findOrFail($id);
        return view('profiles.edit', [
            'user' => $user,
        ]);
    }

    public function update(ProfileUpdateRequest $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profiles.edit', $id)->with('status', 'profile-updated');
    }

    public function destroy(Request $request, $id): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = User::findOrFail($id);

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
