<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function showRegister() {
        return view('pages.register');
    }

    public function showLogin() {
        return view('pages.login');
    }

    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
        'name.required' => 'Поле "Имя" обязательно для заполнения.',
        'email.required' => 'Поле "Почта" обязательно для заполнения.',
        'password.required' => 'Поле "Пароль" обязательно для заполнения.',
        'email.unique' => 'Данная почта уже зарегестрирована',
        'password.confirmed' => 'Пароли не совпадают',
        'password.min' => 'Пароль минимум 8 символов',
        'name.min' => 'Имя минимум 2 символа',
    ]);
        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('pages.register')->with('success', 'Успешная регистрация!');
    }

public function login(Request $request)
{

    $validated = $request->validate([
        'email' => ['required', 'email'],
        'password' => 'required',
    ], [
        'email.required' => 'Поле "Почта" обязательно для заполнения.',
        'password.required' => 'Поле "Пароль" обязательно для заполнения.',
        'email.email' => 'Поле "Почта" должно быть валидным',
    ]);


    if (! auth()->attempt($validated)) {
        return back()->withErrors(['email' => 'Неверная почта или пароль.']);
    }

    $request->session()->regenerate();
    return redirect()->route('pages.index')->with('success', 'Успешный вход!');
}

    public function logout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('pages.index');
    }


      public function indexUser()
    {

        $user = auth()->user();

        $tickets = \App\Models\User::find(auth()->id())->tickets()->get();

        return view('pages.useracc', compact('tickets','user'));
    }

}
