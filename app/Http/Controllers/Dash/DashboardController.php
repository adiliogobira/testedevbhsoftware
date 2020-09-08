<?php

namespace App\Http\Controllers\Dash;

use App\Alunos;
use App\Curso;
use App\Disciplina;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        if (empty(session()->get("userLogin")) || !session()->has("userLogin")) {

            session()->flash('error', "Esta página é restrita, faça seu login!");
            session()->flash('class', "warning");
            session()->flash('ico', "fa fa-exclamation-triangle");
            return redirect()->route("login");
        }
        $alunos = (new User())->where("level", 1)->count();
        $materias = (new Curso())->count();
        $disciplinas = (new Disciplina())->count();
        $professores = (new User())->where("level", ">=", 5)->count();
        $data = [
            "user" => User::find(session()->get("userLogin")),
            "alunos" => $alunos,
            "materias" => $materias,
            "disciplinas" => $disciplinas,
            "professores" => $professores,
        ];
        return view("dashboard")->with($data);
    }

    public function relatorios()
    {
        if (empty(session()->get("userLogin")) || !session()->has("userLogin")) {

            session()->flash('error', "Esta página é restrita, faça seu login!");
            session()->flash('class', "warning");
            session()->flash('ico', "fa fa-exclamation-triangle");
            return redirect()->route("login");
        }

        $alunos = (new User())->where("level", 1)->count();
        $materias = (new Curso())->count();
        $disciplinas = (new Disciplina())->count();
        $matriculas = (new Alunos())->all();
        $professores = (new User())->where("level", ">=", 5)->count();
        $data = [
            "user" => User::find(session()->get("userLogin")),
            "alunos" => $alunos,
            "materias" => $materias,
            "disciplinas" => $disciplinas,
            "professores" => $professores,
            "matriculas" => $matriculas,
        ];
        return view("statistic")->with($data);
    }
}
