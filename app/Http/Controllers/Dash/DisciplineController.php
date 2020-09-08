<?php

namespace App\Http\Controllers\Dash;

use App\Curso;
use App\Disciplina;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DisciplineController extends Controller
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
        $teacher = User::where("level", ">", 1)->get();
        $data = ["user" => User::find(session()->get("userLogin")), 'cursos' => Curso::all()];
        return view("back.cursos.discipline_todos")->with($data);
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
        $teacher = User::where("level", ">", 1)->get();
        $data = ["user" => User::find(session()->get("userLogin")), 'teacher' => $teacher];
        return view("back.cursos.discipline_form")->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (empty($request->titulo)) {
            session()->flash('error', "Informe do título do curso!");
            session()->flash('class', "warning");
            session()->flash('ico', "fa fa-exclamation-triangle");
            return redirect()->route("disciplina.create");
        }
        if (empty($request->descricao)) {
            session()->flash('error', "Informe a descrição do curso!");
            session()->flash('class', "warning");
            session()->flash('ico', "fa fa-exclamation-triangle");
            return redirect()->route("disciplina.create");
        }
        if (empty($request->userId)) {
            session()->flash('error', "Você deve informar qual o professor deste curso!");
            session()->flash('class', "warning");
            session()->flash('ico', "fa fa-exclamation-triangle");
            return redirect()->route("disciplina.create");
        }
        if (empty($request->dataInicio)) {
            session()->flash('error', "Quando o curso inicia?");
            session()->flash('class', "warning");
            session()->flash('ico', "fa fa-exclamation-triangle");
            return redirect()->route("disciplina.create");
        }
        if (empty($request->dataFim)) {
            session()->flash('error', "Quando o curso termina?");
            session()->flash('class', "warning");
            session()->flash('ico', "fa fa-exclamation-triangle");
            return redirect()->route("disciplina.create");
        }
        $Curso = new Curso();
        $Curso->titulo = $request->titulo;
        $Curso->descricao = $request->descricao;
        $Curso->userId = $request->userId;
        $Curso->dataInicio = date("Y-m-d", strtotime($request->dataInicio));
        $Curso->dataFim = date("Y-m-d", strtotime($request->dataFim));
        $Curso->save();

        session()->flash('error', "Curso cadastrado com sucesso!");
        session()->flash('class', "success");
        session()->flash('ico', "fa fa-check");

        return redirect()->route("disciplina.index");
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Disciplina $disciplina
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $id)
    {
        $curso = $id;
        if (empty(session()->get("userLogin")) || !session()->has("userLogin")) {

            session()->flash('error', "Esta página é restrita, faça seu login!");
            session()->flash('class', "warning");
            session()->flash('ico', "fa fa-exclamation-triangle");
            return redirect()->route("login");
        }
        $teacher = User::where("level", ">", 1)->get();
        $data = ["user" => User::find(session()->get("userLogin")), 'curso' => $curso, 'teacher' => $teacher];
        return view("back.cursos.discipline_show")->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Disciplina $disciplina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        $request['dataInicio'] = date("Y-m-d", strtotime($request['dataInicio']));
        $request['dataFim'] = date("Y-m-d", strtotime($request['dataFim']));

        $curso->titulo = $request->titulo;
        $curso->descricao = $request->descricao;
        $curso->userId = $request->userId;
        $curso->dataInicio = $request->dataInicio;
        $curso->dataFim = $request->dataFim;
        $curso->update();

        session()->flash('error', "Curso Atualizado com sucesso!");
        session()->flash('class', "success");
        session()->flash('ico', "fa fa-check");

        return redirect()->route("disciplina.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Disciplina $disciplina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
        session()->flash('error', "Curso deletado com sucesso!");
        session()->flash('class', "success");
        session()->flash('ico', "fa fa-check");

        return redirect()->route("disciplina.index");
    }
}
