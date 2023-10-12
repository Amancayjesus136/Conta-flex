@extends('layouts.admin')


@section('content')
<div class="row project-wrapper">
    <div class="col-xxl-8">
        <div class="row">
            <div class="col-xl-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                    <i data-feather="briefcase" class="text-primary"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-3">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Active Projects</p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="825">0</span></h4>
                                    <span class="badge badge-soft-danger fs-12"><i class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>5.02 %</span>
                                </div>
                                <p class="text-muted text-truncate mb-0">Projects this month</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                    <i data-feather="award" class="text-warning"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="text-uppercase fw-medium text-muted mb-3">New Leads</p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="7522">0</span></h4>
                                    <span class="badge badge-soft-success fs-12"><i class="ri-arrow-up-s-line fs-13 align-middle me-1"></i>3.58 %</span>
                                </div>
                                <p class="text-muted mb-0">Leads this month</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-info text-info rounded-2 fs-2">
                                    <i data-feather="clock" class="text-info"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-3">
                                <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Fecha & Hora</p>
                                <div class="d-flex align-items-center mb-3">
                                    <h4 class="fs-4 flex-grow-1 mb-0">
                                        <span id="reloj"></span>
                                    </h4>
                                </div>
                                <p class="text-muted text-truncate mb-0"><span id="fecha"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                <img src="{{ asset('assets/images/logo2.jpg') }}" alt="" height="60" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

@extends('layouts.footer')

<script>
    function actualizarHora() {
        var ahora = new Date();
        var horas = ahora.getHours();
        var minutos = ahora.getMinutes();
        var segundos = ahora.getSeconds();

        minutos = minutos < 10 ? '0' + minutos : minutos;
        segundos = segundos < 10 ? '0' + segundos : segundos;

        var fechaActual = ahora.getDate() + '/' + (ahora.getMonth() + 1) + '/' + ahora.getFullYear();

        document.getElementById('reloj').textContent = horas + ':' + minutos + ':' + segundos;

        document.getElementById('fecha').textContent = fechaActual;
    }

    setInterval(actualizarHora, 1000);

    actualizarHora();
</script>


@endsection
        
