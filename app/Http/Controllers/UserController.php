<?php

namespace App\Http\Controllers;

use App\Adress;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getEdit()
    {
        $user = Auth::user();

        return view('user.editUser', ['user' => $user]);
    }

    public function edit(EditUserRequest $request)
    {
        $request->validated();

        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->cpf = $request->cpf;

        $user->save();

        return redirect()->route('dashboard')->with('success', 'Editado com sucesso');
    }

    public function destroy()
    {
        $id = Auth::id();

        User::destroy($id);

        return redirect()->route('getLogin')->with('success', 'Usuário excluído com sucesso!');
    }

    public function getRegister()
    {
        if (Auth::check()){
            return redirect()->route('dashboard');
        }else{

            return view('user.register');
        }
    }

    public function register(RegisterUserRequest $request)
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
        $id = Auth::id();
        $addresses = Adress::where('user_id', $id)->get();

        return view('user.dashboard', ['user' => $user, 'addresses' => $addresses]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('getLogin');
    }
}
