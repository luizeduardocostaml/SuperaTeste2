<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function getLogin()
    {
        if (Auth::check()){
            return redirect()->route('dashboard');
        }else{
            return view('user.login');
        }
    }

    public function login(LoginUserRequest $request)
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




}
