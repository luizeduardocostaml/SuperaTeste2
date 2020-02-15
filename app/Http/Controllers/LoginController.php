<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginUserRequest;
use App\Http\Requests\registerUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('user.login');
    }

    public function login(loginUserRequest $request)
    {
        $request->validated();

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('getLogin')->with('error', 'Dados incorretos, tente novamente.');
        }
    }

    public function getRegister()
    {
        return view('user.register');
    }

    public function register(registerUserRequest $request)
    {
        $request->validated();

        $user = new User;

        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->cpf = $request->cpf;

        $user->save();

        return redirect()->route('getLogin')->with('success', 'Cadastrado com sucesso!');
    }

    public function dashboard()
    {
        $user = Auth::user();

        return view('user.dashboard', ['user' => $user]);
    }
}
