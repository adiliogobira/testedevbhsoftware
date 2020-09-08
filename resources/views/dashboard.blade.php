@extends('inc.master')
@section('body')
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
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">Painel</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Painel</li>
                                </ol>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <h5 class="mb-2">Informações da plataforma</h5>
                        <div class="row">
                            @if($user->level >= 5)
                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info"><i class="fa fa-user-graduate"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Alunos</span>
                                            <span class="info-box-number">{{ $alunos }}</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            @endif
                        <!-- /.col -->
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="fa fa-book-reader"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Cursos</span>
                                        <span class="info-box-number">{{ $materias }}</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-warning"><i class="fa fa-bookmark"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Disciplinas</span>
                                        <span class="info-box-number">{{ $disciplinas }}</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            @if($user->level >= 5)
                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-danger"><i class="fa fa-user-friends"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Professores</span>
                                            <span class="info-box-number">{{ $professores }}</span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                        @endif
                        <!-- /.col -->
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

        <!-- OPTIONAL SCRIPTS -->
        <script src="{{ asset("plugins/chart.js/Chart.min.js") }}"></script>
        <script src="{{ asset("assets/js/demo.js") }}"></script>
        <script src="{{ asset("assets/js/pages/dashboard3.js") }}"></script>
@endsection