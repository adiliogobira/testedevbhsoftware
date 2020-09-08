@extends('inc.master')
@section('body')
    <link rel="stylesheet" href="{{ asset("plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") }}">
    <link rel="stylesheet" href="{{ asset("plugins/datatables-responsive/css/responsive.bootstrap4.min.css") }}">
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
                                <h1>Todos os alunos</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ route("home") }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Todos os alunos</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                @if(session()->has("error"))
                    <div class="alert alert-{{ (session()->has("class")?session()->get('class'):"info") }}">
                        @if(session()->has('ico'))
                            <i class="{{ session()->get('ico') }} pull-left mr-2"></i>
                        @endif
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Disciplina</th>
                                <th>Aluno</th>
                                <th>Idade</th>
                                <th>Notas</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(empty($matriculas))
                                <tr>
                                    <td colspan="4"> nenhum curso cadastrado</td>
                                </tr>
                            @else
                                @foreach($matriculas as $matricula)
                                    <tr>
                                        <td>{{ $matricula->disciplina()->first()->titulo }}</td>
                                        <td>{{ $matricula->user()->first()->nome }} {{ $matricula->user()->first()->sobrenome }}</td>
                                        <td>{{ $matricula->idade() }}</td>
                                        <td>{{ $matricula->points }}</td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Disciplina</th>
                                <th>Aluno</th>
                                <th>Idade</th>
                                <th>Notas</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            @include("inc.footer")
        </div>
        <!-- ./wrapper -->

    @endsection
    @section('scripts')

        <script src="{{ asset("plugins/datatables/jquery.dataTables.min.js") }}"></script>
        <script src="{{ asset("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") }}"></script>
        <script src="{{ asset("plugins/datatables-responsive/js/dataTables.responsive.min.js") }}"></script>
        <script src="{{ asset("plugins/datatables-responsive/js/responsive.bootstrap4.min.js") }}"></script>

        <script>
            $(function () {
                $("#example1").DataTable({
                    "responsive": true,
                    "autoWidth": false,
                });
            });
        </script>
@endsection