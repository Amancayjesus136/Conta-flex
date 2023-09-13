@extends('layouts.admin')


@section('content')


        <section class="section" id="wallet">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center mb-5">
                            <h2 class="mb-3 fw-semibold lh-base">Usa nuestro servicio</h2>
                            <p class="text-muted">Nuestra plataforma te brinda la posibilidad de realizar consultas rápidas y confiables, asegurando un viaje sin preocupaciones.</p>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->

                <div class="row g-4">
                    <div class="col-lg-4">
                        <div class="card text-center border shadow-none">
                            <div class="card-body py-5 px-4">
                                <h5>Consulta DNI</h5>
                                <p class="text-muted pb-1">Por favor, necesito hacer una consulta de DNI para obtener información actualizada.</p>
                                <a href="{{ route('consultar-documentodni') }}" class="btn btn-soft-info">Consulta ya!</a>
                            </div>
                        </div>
                    </div><!-- end col -->
                    <div class="col-lg-4">
                        <div class="card text-center border shadow-none">
                            <div class="card-body py-5 px-4">
                                <h5>Consulta RUC</h5>
                                <p class="text-muted pb-1">Necesito hacer una consulta de RUC para obtener información sobre una empresa.</p>
                                <a href="{{ route('ventas.index') }}" class="btn btn-info">Consulta ya!</a>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-4">
                        <div class="card text-center border shadow-none">
                            <div class="card-body py-5 px-4">
                                <h5>Consulta PLACAS</h5>
                                <p class="text-muted pb-1">Necesito consultar placas vehiculares para obtener información sobre un vehículo.</p>
                                <a href="{{ route('consulta.index') }}" class="btn btn-soft-info">Consulta ya!</a>
                            </div>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        @extends('layouts.footer')

        @endsection
        
