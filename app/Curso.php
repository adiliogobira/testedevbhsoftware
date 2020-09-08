<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = "cursos";
    protected $primaryKey = 'id';

    public function getNomeProfessorAttribute()
    {
        $user = User::find($this->attributes['userId']);
        return "{$user->nome} {$user->sobrenome}";
    }

    public function getTotalAlunosAttribute()
    {
        return Alunos::where("disciplineId", $this->attributes['id'])->count();
    }

    public function disciplinas()
    {
        return $this->hasMany(Disciplina::class, 'cursoId', 'id');
    }

    public function getTempoRestanteAttribute()
    {
        $curso = Curso::find($this->attributes['id']);
        $dataInicio = $curso->dataInicio;
        $dataFim = $curso->dataFim;

        $dateTimeInicio = strtotime($dataInicio);
        $dateTimeFim = strtotime($dataFim);
        $dataFinal = ($dateTimeInicio - $dateTimeFim) / 864000;

        if ($dataFinal) {
            return round($dataFinal *= -1);
        }
    }
}
