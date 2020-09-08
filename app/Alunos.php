<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alunos extends Model
{
    protected $table = "student_discipline";

    public function user()
    {
        return $this->hasOne(User::class, "id", "userId");
    }

    public function disciplina()
    {
        return $this->hasOne(Curso::class, 'id', 'disciplineId');
    }

    public function idade()
    {
        $user = User::find($this->attributes['userId']);
        return $idade = date("Y") - date("Y", strtotime($user->dtNascimento));
    }
}
