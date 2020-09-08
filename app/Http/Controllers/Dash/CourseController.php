<?php

namespace App\Http\Controllers\Dash;

use App\Curso;
use App\Disciplina;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Curso $curso)
    {
        if (empty(session()->get("userLogin")) || !session()->has("userLogin")) {

            session()->flash('error', "Esta página é restrita, faça seu login!");
            session()->flash('class', "warning");
            session()->flash('ico', "fa fa-exclamation-triangle");
            return redirect()->route("login");
        }
        $teacher = User::where("level", ">", 1)->get();
        $curso = Curso::all();
        $data = ["user" => User::find(session()->get("userLogin")), 'teacher' => $teacher, "curso" => $curso];
        return view("back.cursos.curso_form")->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $disciplina = new Disciplina();
        $disciplina->titulo = $request->titulo;
        $disciplina->slug = Str::slug($request->titulo);
        $disciplina->descricao = $request->descricao;
        $disciplina->cursoId = $request->cursoId;
        $disciplina->dataInicio = date("Y-m-d", strtotime($request->dataInicio));
        $disciplina->dataFim = date("Y-m-d", strtotime($request->dataFim));
        $disciplina->save();

        session()->flash('error', "Curso cadastrado com sucesso!");
        session()->flash('class', "success");
        session()->flash('ico', "fa fa-check");

        return redirect()->route("disciplina.index");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Curso $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Curso $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Curso $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Curso $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return redirect()->route("disciplina.index");
    }
}
