<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'name.required' => 'Пожалуйста, введите ваше имя',
            'name.string' => 'Имя должно быть текстом',
            'name.max' => 'Имя не должно превышать 255 символов',
            'email.required' => 'Пожалуйста, введите email',
            'email.string' => 'Email должен быть текстом',
            'email.lowercase' => 'Email должен быть в нижнем регистре',
            'email.email' => 'Введите корректный адрес электронной почты',
            'email.max' => 'Email не должен превышать 255 символов',
            'email.unique' => 'Этот email уже используется',
            'password.required' => 'Пожалуйста, введите пароль',
            'password.confirmed' => 'Пароли не совпадают',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('vacancies.index'));
    }
}
