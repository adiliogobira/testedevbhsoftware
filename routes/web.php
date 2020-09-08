<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Users\\AccountController@login')->name('home');
Route::get('/login', 'Users\\AccountController@login')->name('login');
Route::get('/logout', 'Users\\AccountController@logout')->name('logout');
Route::post('/logar', 'Users\\AccountController@logar')->name('logar');
Route::get('/painel', 'Dash\\DashboardController@index')->name('home');

Route::get('/disciplina', 'Dash\\DisciplineController@index')->name('disciplina.index');
Route::get('/disciplina/create', 'Dash\\DisciplineController@create')->name('disciplina.create');
Route::post('/disciplina/store', 'Dash\\DisciplineController@store')->name('disciplina.store');
Route::get('/disciplina/{id}/edit', 'Dash\\DisciplineController@edit')->name('disciplina.edit');
Route::post('/disciplina/{curso}/update', 'Dash\\DisciplineController@update')->name('disciplina.update');
Route::get('/disciplina/{curso}/delete', 'Dash\\DisciplineController@destroy')->name('disciplina.delete');

Route::get('/disciplina/novo-curso', 'Dash\\CourseController@create')->name('curso.create');
Route::post('/disciplina/novo-curso/do', 'Dash\\CourseController@store')->name('curso.store');

//Route::resource("/user", "Users\\UserController")->name("user");
Route::get("/user", "Users\\UserController@index")->name("user.index");
Route::get("/user/novo", "Users\\UserController@create")->name("user.create");
Route::post("/user/create", "Users\\UserController@store")->name("user.store");
Route::get("/user/{user}/edit", "Users\\UserController@edit")->name("user.edit");
Route::post("/user/{user}/edit", "Users\\UserController@update")->name("user.update");
Route::post("/user/{user}/delete", "Users\\UserController@edit")->name("user.delete");

Route::get('/relatorio','Dash\\DashboardController@relatorios')->name("statistic");

/*Route::get('/recupera-senha', 'User\\AccountController@recover')->name('recover');

Route::resource('/cursos', 'Dash\\CourseController')->names('course');
Route::resource('/disciplinas', 'Dash\\DisciplineController')->names('discipline');
Route::resource('/exercicios', 'Dash\\ExerciseController')->names('exercise');
Route::resource('/alunos', 'User\\StudentController')->names('student');
Route::get('/estatisticas', 'Dash\\StatisticController@statistic')->name('statistic');
Route::get('/perfil', 'Dash\\AccountController@profile')->name('profile');*/