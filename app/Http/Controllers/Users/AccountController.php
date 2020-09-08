<?php

namespace App\Http\Controllers\Users;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function login(Request $request)
    {
        return view("login");
    }

    public function logout()
    {
        session()->flush();
        session()->flash('error', "Você deslogou com sucesso!");
        return redirect()->route('login');
    }

    public function logar(Request $request)
    {
        if (empty($request->email)) {
            session()->flash('error', "Atenção! você deve informar seu e-mail");
            return redirect()->back();
        }
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            session()->flash('error', "Informe um e-mail válido!");
            return redirect()->back();
        }

        $User = User::where("email", $request->email)->first();
        if (empty($User)) {
            session()->flash('error', "E-mail não cadastrado!");
            return redirect()->back();
        }
        if (!empty($User) && !Hash::check($request->password, $User->password)) {
            session()->flash('error', "Sua senha não confere!");
            return redirect()->back();
        }
        session()->put(['userLogin' => $User->id]);
        return redirect()->route("home");
    }
}
