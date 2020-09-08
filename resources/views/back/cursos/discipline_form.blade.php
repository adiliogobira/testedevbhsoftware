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
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="../../index3.html" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="#" class="nav-link">Contact</a>
                            </li>
                        </ul>

                        <!-- SEARCH FORM -->
                        <form class="form-inline ml-3">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Right navbar links -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Messages Dropdown Menu -->
                            <li class="nav-item dropdown">
                                <a class="nav-link" data-toggle="dropdown" href="#">
                                    <i class="far fa-comments"></i>
                                    <span class="badge badge-danger navbar-badge">3</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                    <a href="#" class="dropdown-item">
                                        <!-- Message Start -->
                                        <div class="media">
                                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                            <div class="media-body">
                                                <h3 class="dropdown-item-title">
                                                    Brad Diesel
                                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                                </h3>
                                                <p class="text-sm">Call me whenever you can...</p>
                                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                            </div>
                                        </div>
                                        <!-- Message End -->
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">
                                        <!-- Message Start -->
                                        <div class="media">
                                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                            <div class="media-body">
                                                <h3 class="dropdown-item-title">
                                                    John Pierce
                                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                                </h3>
                                                <p class="text-sm">I got your message bro</p>
                                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                            </div>
                                        </div>
                                        <!-- Message End -->
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">
                                        <!-- Message Start -->
                                        <div class="media">
                                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                            <div class="media-body">
                                                <h3 class="dropdown-item-title">
                                                    Nora Silvester
                                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                                </h3>
                                                <p class="text-sm">The subject goes here</p>
                                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                            </div>
                                        </div>
                                        <!-- Message End -->
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                                </div>
                            </li>
                            <!-- Notifications Dropdown Menu -->
                            <li class="nav-item dropdown">
                                <a class="nav-link" data-toggle="dropdown" href="#">
                                    <i class="far fa-bell"></i>
                                    <span class="badge badge-warning navbar-badge">15</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                    <span class="dropdown-item dropdown-header">15 Notifications</span>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                                        <span class="float-right text-muted text-sm">3 mins</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-users mr-2"></i> 8 friend requests
                                        <span class="float-right text-muted text-sm">12 hours</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">
                                        <i class="fas fa-file mr-2"></i> 3 new reports
                                        <span class="float-right text-muted text-sm">2 days</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
                                            class="fas fa-th-large"></i></a>
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
                                        <h1>Cadastrar nova disciplina</h1>
                                    </div>
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item active">Nova disciplina</li>
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
                                                <h3 class="card-title">Informações básicas da disciplina</h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <!-- form start -->
                                            <form action="{{ route("disciplina.store") }}" method="post">
                                                {{ csrf_field() }}
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Título</label>
                                                        <input type="text" name="titulo" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                                    </div>
                                                    <div class="form-group pad">
                                                        <label for="exampleInputPassword1">Descrição</label>
                                                        <div class="mb-3">
                                                            <textarea class="textarea" name="descricao" placeholder="Place some text here"
                                                                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Selecione o professor</label>
                                                        <select class="form-control select2" name="userId" style="width: 100%;">
                                                            @if(empty($teacher))
                                                                <option value="-1">Não há professores cadastrados</option>
                                                            @else
                                                                @foreach($teacher as $prof)
                                                                    <option value="{{ $prof->id }}">{{ $prof->nome }} {{ $prof->sobrenome }}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6 pull-left">
                                                            <label>Data de início</label>
                                                            <input type="date" class="form-control" name="dataInicio" placeholder="Data de início"/>
                                                        </div>
                                                        <div class="col-md-6 pull-right">
                                                            <label>Data de término</label>
                                                            <input type="date" class="form-control" name="dataFim" placeholder="Data de término"/>
                                                        </div>
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
                <script src="{{ asset("plugins/daterangepicker/daterangepicker.js") }}"></script>
                <!-- Select2 -->
                <script src="{{ asset("plugins/select2/js/select2.full.min.js") }}"></script>
                <script>
                    $(function () {
                        //Initialize Select2 Elements
                        $('.select2').select2();
                        $('.textarea').summernote();

                    });
                </script>
        @endsection