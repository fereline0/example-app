<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class UserController extends Controller
{
    use AuthorizesRequests;

    public function show($id): View
    {
        $user = User::findOrFail($id);
        $reviews = $user->reviews()->paginate(20);

        return view('users.show', compact('user', 'reviews'));
    }

    public function edit($id): View
    {
        $user = User::findOrFail($id);

        $this->authorize('edit', $user);

        return view('users.edit', compact('user'));
    }

    public function update(ProfileUpdateRequest $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $this->authorize('edit', $user);

        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('users.edit', $id)->with('status', 'profile-updated');
    }

    public function destroy(Request $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $this->authorize('edit', $user);
    
        if (Auth::id() === $user->id) {
            Auth::logout();
            $user->delete();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        } else {
            $user->delete();
        }

        return Redirect::to('/');
    }
}
