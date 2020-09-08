@extends('inc.master')
@section('body')
    <body class="hold-transition login-page">
    @endsection
    @section('content')

        <div class="login-box">
            <div class="login-logo">
                <a href="../../index2.html"><b>Escolinha</b>Jubilut</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Área de acesso de alunos e professores</p>
                    @if(session()->has("error"))
                        <div class="alert alert-{{ (session()->has("class")?session()->get('class'):"info") }}">
                            @if(session()->has('ico'))
                                <i class="{{ session()->get('ico') }} pull-left mr-2"></i>
                            @endif
                            {{ session()->get('error') }}
                        </div>
                    @endif
                    <form action="{{  route("logar") }}" method="post">
                        {{ csrf_field() }}
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->

@endsection