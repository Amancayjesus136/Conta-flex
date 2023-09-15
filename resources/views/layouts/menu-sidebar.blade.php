
<div id="layout-wrapper">

<header id="page-topbar">
<div class="layout-width">
<div class="navbar-header">
    <div class="d-flex">
        <!-- LOGO -->
        <div class="navbar-brand-box horizontal-logo">
            <a href="{{ route('login') }}" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="60">
                </span>
            </a>

            <a href="{{ route('login') }}" class="logo logo-light">
                <span class="logo-sm">
                    <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
                </span>

                <!-- logo de Dashboard -->
                <span class="logo-lg">
                    <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="50" style="margin-top: 15px;">
                </span>
            </a>
        </div>

        <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
            <span class="hamburger-icon">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </button>

    </div>

    <div class="d-flex align-items-center">

        <div class="dropdown d-md-none topbar-head-dropdown header-item">
            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="bx bx-search fs-22"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                <form class="p-3">
                    <div class="form-group m-0">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="ms-1 header-item d-none d-sm-flex">
            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                <i class='bx bx-fullscreen fs-22'></i>
            </button>
        </div>

        <!-- <div class="ms-1 header-item d-none d-sm-flex">
            <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                <i class='bx bx-moon fs-22'></i>
            </button>
        </div> -->


        <div class="dropdown ms-sm-3 header-item topbar-user">
            <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="d-flex align-items-center">
                    <span class="text-start ms-xl-2">
                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ Auth::user()->name }}</span>
                        <span class="d-none d-xl-block ms-1 fs-12 text-muted user-name-sub-text">Founder</span>
                    </span>
                </span>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <h6 class="dropdown-header">Welcome {{ Auth::user()->name }}!</h6>
                <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span>
                  </a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</header>

<!-- removeNotificationModal -->
<div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
    </div>
    <div class="modal-body">
        <div class="mt-2 text-center">
            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                <h4>Are you sure ?</h4>
                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
            </div>
        </div>
        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
        </div>
    </div>

</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{ route('login') }}" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="50" style="margin-top: 20px;">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="{{ route('login') }}" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
            <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="100" style="margin-top: 15px;">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

<!-- ============================================================== -->
<!-- INICIO -->
<!-- ============================================================== --> 

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('login') }}">
                        <i class="fas fa-home"></i> <span data-key="t-Usuarios">Inicio</span>
                    </a>
                </li>

<!-- ============================================================== -->
<!-- USUARIOS -->
<!-- ============================================================== -->
 @if(auth()->user()->hasRole('superadministrador'))
<li class="nav-item">
    <a class="nav-link menu-link" href="#" data-bs-toggle="collapse" data-bs-target="#sidebarSuperadministrador" aria-expanded="false" aria-controls="sidebarSuperadministrador">
        <i class="fas fa-crown"></i> <span data-key="t-Configuración">Super administrador</span>
    </a>
    <div class="collapse menu-dropdown" id="sidebarSuperadministrador">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="{{ route('usuarios.index') }}" class="nav-link" data-key="t-Suscripción">
                    <i class="fas fa-users"></i> Roles
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('historial.consultas.ruc') }}" class="nav-link" data-key="t-Suscripción">
                    <i class="fas fa-archive"></i> Historial de RUC
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('actividades-generales.index') }}" class="nav-link" data-key="t-Suscripción">
                    <i class="fas fa-archive"></i> Historial de Actividad de usuarios
                </a>
            </li>
        </ul>
    </div>
</li>
@endif 

<!-- ============================================================== -->
<!-- utilitarios -->
<!-- ============================================================== -->
<li class="nav-item">
    <a class="nav-link menu-link" href="#" data-bs-toggle="collapse" data-bs-target="#utilitarios" aria-expanded="false" aria-controls="utilitarios">
        <i class="fas fa-cogs"></i> <span data-key="t-Configuración">utilitarios</span>
    </a>
    <div class="collapse menu-dropdown" id="utilitarios">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="{{ route('empresa.index') }}" class="nav-link" data-key="t-Suscripción">
                    <i class="fas fa-building"></i> Mantenimientos de Compañias
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-key="t-Suscripción">
                    <i class="fas fa-percent"></i> Tasa de IGV
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-key="t-Suscripción">
                    <i class="fas fa-exchange-alt"></i> Tipo de cambio
                </a>
            </li>
        </ul>
    </div>
</li>

<!-- ============================================================== -->
<!-- Proyectos -->
<!-- ============================================================== -->
<li class="nav-item">
    <a class="nav-link menu-link" href="#" data-bs-toggle="collapse" data-bs-target="#sidebarModuloConsultas" aria-expanded="false" aria-controls="sidebarModuloConsultas">
        <i class="fas fa-chart-bar"></i> <span data-key="t-Configuración">Registros</span>
    </a>
    <div class="collapse menu-dropdown" id="sidebarModuloConsultas">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="{{ route('ventas.index') }}" class="nav-link" data-key="t-Suscripción">
                    <i class="fas fa-file-invoice-dollar"></i> Registro de Compras
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-key="t-Suscripción">
                    <i class="fas fa-file-invoice"></i> Registro de Ventas
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link menu-link" href="#" data-bs-toggle="collapse" data-bs-target="#sidebarModuloListado" aria-expanded="false" aria-controls="sidebarModuloListado">
        <i class="fas fa-chart-pie"></i> <span data-key="t-Configuración">Reportes</span>
    </a>
    <div class="collapse menu-dropdown" id="sidebarModuloListado">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="#" class="nav-link" data-key="t-Suscripción">
                    <i class="fas fa-file-invoice-dollar"></i> Reporte de Ventas
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" data-key="t-Suscripción">
                    <i class="fas fa-file-invoice"></i> Reporte de Compras
                </a>
            </li>
        </ul>
    </div>
</li>

        </div>
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
