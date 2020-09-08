<?php

namespace App\Http\Controllers\Users;

use App\Alunos;
use App\Curso;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (empty(session()->get("userLogin")) || !session()->has("userLogin")) {

            session()->flash('error', "Esta página é restrita, faça seu login!");
            session()->flash('class', "warning");
            session()->flash('ico', "fa fa-exclamation-triangle");
            return redirect()->route("login");
        }

        $data = ["user" => User::find(session()->get("userLogin")), 'users' => (new User())->where("level", 1)->get()];
        return view("user.index")->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (empty(session()->get("userLogin")) || !session()->has("userLogin")) {

            session()->flash('error', "Esta página é restrita, faça seu login!");
            session()->flash('class', "warning");
            session()->flash('ico', "fa fa-exclamation-triangle");
            return redirect()->route("login");
        }


        $data = ["user" => User::find(session()->get("userLogin")), 'cursos' => (new Curso())->all()];
        return view("user.cadnew")->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $User->nome = $request->nome
        if (empty($request->nome)) {
            session()->flash('error', "Informe o nome");
            return redirect()->back();
        }
        if (empty($request->sobrenome)) {
            session()->flash('error', "Informe o sobrenome");
            return redirect()->back();
        }
        if (empty($request->rg)) {
            session()->flash('error', "Informe o RG");
            return redirect()->back();
        }
        if (empty($request->cpf)) {
            session()->flash('error', "Informe o CPF válido");
            return redirect()->back();
        }
        if (empty($request->email)) {
            session()->flash('error', "Informe um e-mail válido");
            return redirect()->back();
        }
        if (empty($request->password)) {
            session()->flash('error', "Você deve informar uma senha");
            return redirect()->back();
        }
        if (empty($request->level)) {
            session()->flash('error', "Qual o nível de acesso deste usuário?");
            return redirect()->back();
        }
        if (empty($request->dtNascimento)) {
            session()->flash('error', "Informe a data de nasacimento deste usuário");
            return redirect()->back();
        }

        $User = new User();
        $User->nome = $request->nome;
        $User->sobrenome = $request->sobrenome;
        $User->rg = $request->rg;
        $User->cpf = $request->cpf;
        $User->dtNascimento = date("Y-m-d", strtotime($request->dtNascimento));
        $User->email = $request->email;
        $User->password = Hash::make($request->password);
        $User->level = $request->level;
        $User->save();

        foreach ($request->curso as $curso) {
            $Alunos = new Alunos();
            $Alunos->userId = $User->id;
            $Alunos->disciplineId = $curso;
            $Alunos->points = 0;
            $Alunos->save();
        }

        session()->flash('error', "O usuário {$request->nome} foi cadastrado com sucesso!");
        session()->flash('class', "success");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        if (empty(session()->get("userLogin")) || !session()->has("userLogin")) {

            session()->flash('error', "Esta página é restrita, faça seu login!");
            session()->flash('class', "warning");
            session()->flash('ico', "fa fa-exclamation-triangle");
            return redirect()->route("login");
        }

        $data = ["user" => User::find(session()->get("userLogin")), 'usuario' => $user, 'cursos' => (new Curso())->all()];
        return view("user.edit")->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

//        $User->nome = $request->nome
        if (empty($request->nome)) {
            session()->flash('error', "Informe o nome");
            return redirect()->back();
        }
        if (empty($request->sobrenome)) {
            session()->flash('error', "Informe o sobrenome");
            return redirect()->back();
        }
        if (empty($request->rg)) {
            session()->flash('error', "Informe o RG");
            return redirect()->back();
        }
        if (empty($request->cpf)) {
            session()->flash('error', "Informe o CPF válido");
            return redirect()->back();
        }
        if (empty($request->email)) {
            session()->flash('error', "Informe um e-mail válido");
            return redirect()->back();
        }
        if (empty($request->password)) {
            session()->flash('error', "Você deve informar uma senha");
            return redirect()->back();
        }
        if (empty($request->level)) {
            session()->flash('error', "Qual o nível de acesso deste usuário?");
            return redirect()->back();
        }
        if (empty($request->dtNascimento)) {
            session()->flash('error', "Informe a data de nasacimento deste usuário");
            return redirect()->back();
        }

        $User = $user;
        $User->nome = $request->nome;
        $User->sobrenome = $request->sobrenome;
        $User->rg = $request->rg;
        $User->cpf = $request->cpf;
        $User->dtNascimento = date("Y-m-d", strtotime($request->dtNascimento));
        $User->email = $request->email;
        if (!empty($request->password)) {
            $User->password = Hash::make($request->password);
        }
        $User->level = $request->level;
        $User->save();

        foreach ($request->curso as $curso) {
            $Alunos = (new Alunos())->where("userId", $User->id)->where("disciplineId", $curso)->first();
            if (!empt($Alunos)) {
                $Alunos->userId = $User->id;
                $Alunos->disciplineId = $curso;
                $Alunos->save();
            } else {
                $Alunos = new Alunos();
                $Alunos->userId = $User->id;
                $Alunos->disciplineId = $curso;
                $Alunos->points = 0;
                $Alunos->save();
            }
        }

        session()->flash('error', "O usuário {$request->nome} foi cadastrado com sucesso!");
        session()->flash('class', "success");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('error', "Curso deletado com sucesso!");
        session()->flash('class', "success");
        session()->flash('ico', "fa fa-check");

        return redirect()->route("user.index");
    }
}
