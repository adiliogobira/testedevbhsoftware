@extends('inc.master')
@section('body')

    <link rel="stylesheet" href="{{ asset("plugins/select2/css/select2.min.css") }}">
    <link rel="stylesheet" href="{{ asset("plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css") }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset("plugins/summernote/summernote-bs4.css") }}">
    <link rel="stylesheet" href="{{ asset("plugins/daterangepicker/daterangepicker.css") }}">

    <body class="hold-transition sidebar-mini">
    @endsection
    @section('content')
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

            </nav>
            <!-- /.navbar -->
        @include("inc.menu")


        <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Cadastrar novo usuário/aluno</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Novo usuário/aluno</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                                @if(session()->has("error"))
                                    <div class="alert alert-{{ (session()->has("class")?session()->get('class'):"info") }}">
                                        @if(session()->has('ico'))
                                            <i class="{{ session()->get('ico') }} pull-left mr-2"></i>
                                        @endif
                                        {{ session()->get('error') }}
                                    </div>
                            @endif
                            <!-- general form elements -->
                                <div class="card card-default">
                                    <div class="card-header">
                                        <h3 class="card-title">Insira as informações para cadastro de um novo usuário</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="{{ route("user.store") }}" method="post">
                                        {{ csrf_field() }}
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nome</label>
                                                <input type="text" name="nome" class="form-control" placeholder="Informe o nome">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Sobrenome</label>
                                                <input type="text" name="sobrenome" class="form-control" placeholder="Informe o sobrenome">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">RG</label>
                                                <input type="text" name="rg" class="form-control" placeholder="Insira o RG">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">CPF</label>
                                                <input type="text" name="cpf" class="form-control" placeholder="Informe um CPF válido">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Data de nascimento</label>
                                                <input type="text" name="dtNascimento" class="form-control" placeholder="Informe a data de nascimento" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask/>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">E-mail</label>
                                                <input type="email" name="email" class="form-control" placeholder="Insira um e-mail válido">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Senha</label>
                                                <input type="password" name="password" class="form-control" placeholder="Insira uma senha">
                                            </div>
                                            <div class="form-group">
                                                <label>Nível de usuário</label>
                                                <select class="form-control" name="level" style="width: 100%;">
                                                    <option value="-1">Selecione um nível para este usuário/aluno</option>
                                                    <option value="1">Aluno</option>
                                                    <option value="5">Professor</option>
                                                    <option value="10">Diretor</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Matricular este usuario em algum curso</label>
                                                @foreach($cursos as $curso)
                                                    <div class="col-md-4">
                                                        <label>
                                                            <input type="checkbox" name="curso[]" value="{{ $curso->id }}"> {{ $curso->titulo }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                            <!--/.col (left) -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            @include("inc.footer")
        </div>
        <!-- ./wrapper -->

    @endsection
    @section('scripts')

        <!-- Summernote -->
        <script src="{{ asset("plugins/summernote/summernote-bs4.min.js") }}"></script>
        <!-- InputMask -->
        <script src="{{ asset("plugins/moment/moment.min.js") }}"></script>
        <script src="{{ asset("plugins/inputmask/min/jquery.inputmask.bundle.min.js") }}"></script>

        <!-- Select2 -->
        <script src="{{ asset("plugins/select2/js/select2.full.min.js") }}"></script>
        <script>
            $(function () {
                //Initialize Select2 Elements

                $('.select2').select2();
                $('.textarea').summernote();

                //Datemask dd/mm/yyyy
                $('[data-mask]').inputmask();
            });
        </script>
@endsection