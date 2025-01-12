<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PasswordController extends Controller
{
    use AuthorizesRequests;

    public function update(Request $request, $id): RedirectResponse
    {
        $user = User::findOrFail($id);

        $this->authorize('edit', $user);
        $this->authorize('beOwnerOfThePage', $user);

        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ], [
            'current_password.required' => 'Пожалуйста, введите текущий пароль.',
            'current_password.current_password' => 'Текущий пароль неверен.',
            'password.required' => 'Пожалуйста, введите новый пароль.',
            'password.confirmed' => 'Пароли не совпадают.',
        ]);

        $user->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }
}
