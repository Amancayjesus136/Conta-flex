<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Landing | Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!--Swiper slider css-->
    <link href="assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />

</head>

<style>
    /* Estilo predeterminado en negro */
    .inicio,
    .consultanos,
    .salidas,
    .contactanos,
    .ayuda {
        color: #0ab39c;
    }

    /* Cambio de color a azul cuando el cursor pasa por encima */
    .inicio:hover,
    .consultanos:hover,
    .salidas:hover,
    .contactanos:hover,
    .ayuda:hover {
        color: skyblue;
    }
</style>

<body data-bs-spy="scroll" data-bs-target="#navbar-example">

    <!-- Begin page -->
    <div class="layout-wrapper landing">
        <nav class="navbar navbar-expand-lg navbar-landing navbar-light fixed-top" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="assets/images/logo-light.png" class="card-logo card-logo-dark" alt="logo dark" height="60">
                    <img src="assets/images/logo-light.png" class="card-logo card-logo-light" alt="logo light" height="60">
                </a>
                <button class="navbar-toggler py-0 fs-20 text-body" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0" id="navbar-example">
                        <li class="nav-item">
                            <a class="nav-link active" href="/"><p class="inicio">Inicio</p></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wallet"><p class="consultanos">Consulta</p></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#marketplace"><p class="salidas">Entradas/Salidas</p></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#categories"><p class="contactanos">Contactanos</p></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#creators"><p class="ayuda">Ayuda</p></a>
                        </li>
                    </ul>

                    <div class="">
                    <a href="{{ route('login') }}" class="btn btn-success">Usa tu cuenta!</a>
                    </div>
                </div>

            </div>
        </nav>
            <div class="bg-overlay bg-overlay-pattern"></div>
        <!-- end navbar -->
        @yield('nuevo_contenido')

        <!-- start hero section -->
        <section class="section nft-hero" id="hero">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-10">
                <div class="text-center">
                    <h1 class="display-4 fw-medium mb-4 lh-base text-white">Descubre nuestro Sistema de consultas <span class="text-success">seguro y confiable</span></h1>
                    <p class="lead text-white-50 lh-base mb-4 pb-2">¿Es posible tener un sistema seguro y confiable para consultar placas vehiculares, documentos de identidad y datos de empresas? ¡Sí, con nuestro sistema avanzado de consultas de información!</p>

                    <div class="hstack gap-2 justify-content-center">
                        <a href="#wallet" class="btn btn-danger">Consulta ya!<i class="ri-arrow-right-line align-middle ms-1"></i></a>
                    </div>
                </div>
            </div><!--end col-->
        </div><!-- end row -->
    </div><!-- end container -->
</section>


        <!-- start wallet -->
        <section class="section" id="wallet">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center mb-5">
                            <h2 class="mb-3 fw-semibold lh-base">Usa nuestro servicio gratuito</h2>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->

                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="card text-center border shadow-none">
                            <div class="card-body py-5 px-4">
                                <h5>Consulta DNI</h5>
                                <p class="text-muted pb-1">Por favor, necesito hacer una consulta de DNI para obtener información actualizada.</p>
                                <a href="{{ route('consultar-documento') }}" class="btn btn-soft-info">Consulta ya!</a>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col-lg-4">
                        <div class="card text-center border shadow-none">
                            <div class="card-body py-5 px-4">
                                <h5>Consulta RUC</h5>
                                <p class="text-muted pb-1">Necesito hacer una consulta de RUC para obtener información sobre una empresa.</p>
                                <a href="{{ route('consultar-documentoruc') }}" class="btn btn-info">Consulta ya!</a>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4">
                        <div class="card text-center border shadow-none">
                            <div class="card-body py-5 px-4">
                                <h5>Consulta PLACAS</h5>
                                <p class="text-muted pb-1">Necesito consultar placas vehiculares para obtener información sobre un vehículo.</p>
                                <a href="{{ route('consultar-placa') }}" class="btn btn-soft-info">Consulta ya!</a>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end wallet -->




















    <!-- FOOTER -->

        <section class="py-5 bg-primary position-relative">
            <div class="bg-overlay bg-overlay-pattern opacity-50"></div>
            <div class="container">
                <div class="row align-items-center gy-4">
                    <div class="col-sm">
                        <div>
                            <h4 class="text-white mb-0 fw-semibold">Contactanos</h4>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-sm-auto">
                        <div>
                            <a href="apps-nft-create.html" class="btn bg-gradient btn-danger">WhatsApp</a>
                            <a href="apps-nft-explore.html" class="btn bg-gradient btn-info">Correo Electrónico</a>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end cta -->

        <!-- Start footer -->
        <footer class="custom-footer bg-dark py-5 position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mt-4">
                        <div>
                            <div>
                                <img src="assets/images/logo-light.png" alt="logo light" height="50">
                            </div>
                            <div class="mt-4">
                                <p>Phenomenal</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas cupiditate consequuntur, amet, quaerat quo dolore veniam quos, rerum modi delectus aliquid magni! Placeat fugiat ducimus incidunt dolore soluta possimus facilis.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-7 ms-lg-auto">
                        <div class="row">
                            <div class="col-sm-4 mt-4">
                                <h5 class="text-white mb-0">Nosotros</h5>
                                <div class="text-muted mt-3">
                                    <ul class="list-unstyled ff-secondary footer-list">
                                        <li><a href="pages-profile.html">Conocenos</a></li>
                                        <li><a href="pages-gallery.html">Nuestros servicios</a></li>
                                        <li><a href="apps-projects-overview.html">Nuestros projectos</a></li>
                                        <li><a href="pages-timeline.html">Terminos y condiciones</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-4">
                                <h5 class="text-white mb-0">Consultas</h5>
                                <div class="text-muted mt-3">
                                    <ul class="list-unstyled ff-secondary footer-list">
                                        <li><a href="pages-pricing.html">Consultas DNI</a></li>
                                        <li><a href="apps-mailbox.html">Consultas RUC</a></li>
                                        <li><a href="apps-chat.html">Consultas PLACAS</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-4 mt-4">
                                <h5 class="text-white mb-0">Entradas / Salidas</h5>
                                <div class="text-muted mt-3">
                                    <ul class="list-unstyled ff-secondary footer-list">
                                        <li><a href="pages-faqs.html">Entradas</a></li>
                                        <li><a href="pages-faqs.html">Salidas</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row text-center text-sm-start align-items-center mt-5">
                    <div class="col-sm-6">

                        <div>
                            <p class="copy-rights mb-0">
                                <script> document.write(new Date().getFullYear()) </script> © Phenomenal
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end mt-3 mt-sm-0">
                            <ul class="list-inline mb-0 footer-social-link">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="avatar-xs d-block">
                                        <div class="avatar-title rounded-circle">
                                            <i class="ri-facebook-fill"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="avatar-xs d-block">
                                        <div class="avatar-title rounded-circle">
                                            <i class="ri-github-fill"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="avatar-xs d-block">
                                        <div class="avatar-title rounded-circle">
                                            <i class="ri-linkedin-fill"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="avatar-xs d-block">
                                        <div class="avatar-title rounded-circle">
                                            <i class="ri-google-fill"></i>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="avatar-xs d-block">
                                        <div class="avatar-title rounded-circle">
                                            <i class="ri-dribbble-line"></i>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end footer -->


        

        <!--start back-to-top-->
        <button onclick="topFunction()" class="btn btn-danger btn-icon landing-back-top" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>
        <!--end back-to-top-->

    </div>
    <!-- end layout wrapper -->


    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets/js/plugins.js"></script>

    <!--Swiper slider js-->
    <script src="assets/libs/swiper/swiper-bundle.min.js"></script>

    <script src="assets/js/pages/nft-landing.init.js"></script>
</body>

</html>