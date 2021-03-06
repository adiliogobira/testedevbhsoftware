<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string("sobrenome");
            $table->string("cpf");
            $table->string("rg");
            $table->date("dtNascimento");
            $table->string('email');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->integer("level");//1 = estudante | 10 = Super Admin
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
