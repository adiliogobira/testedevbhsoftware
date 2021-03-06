<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset("assets/img/AdminLTELogo.png") }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="{{ route("user.edit",['user'=>session()->get("userLogin")]) }}" class="d-block">{{ $user->nome }} {{ $user->sobrenome }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route("home") }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Painel
                        </p>
                    </a>

                </li>
                @if($user->level>=5)
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Disciplinas
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route("disciplina.index") }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listar todas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route("disciplina.create") }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Adicionar Nova Disciplina</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("statistic") }}" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Estatísticas
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Alunos
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route("user.index") }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ver todos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route("user.create") }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Adicionar novo aluno</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route("user.edit",['user'=>session()->get("userLogin")]) }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Meus dados
                            </p>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route("logout") }}" class="nav-link">
                        <i class="nav-icon fas fa-power-off"></i>
                        <p>
                            Deslogar
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>