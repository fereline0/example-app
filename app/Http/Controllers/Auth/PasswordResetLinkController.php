<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ], [
            'email.required' => 'Пожалуйста, введите email.',
            'email.email' => 'Пожалуйста, введите корректный адрес электронной почты.',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', 'Ссылка для сброса пароля отправлена на ваш email.')
            : back()->withInput($request->only('email'))
            ->withErrors(['email' => 'Этот email не зарегистрирован.']);
    }
}
