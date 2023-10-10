@extends('layouts.admin')

@section('content')
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card card-animate border rounded p-4">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <h6 class="text-muted mb-3">Taza de IGV</h6>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" id="percentageInput" placeholder="Ingresa el porcentaje">
                        <div class="input-group-append">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <h6 class="text-muted mb-3">Porcentaje %</h6>
                    <h2 class="mb-0" id="resultValue">$<span class="counter-value" data-target="0"></span><small class="text-muted fs-13">.%</small></h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h6 class="text-muted mb-3">Selecciona Ventas</h6>
                    </div>
                    <div class="flex-shrink-0 avatar-sm">
                        <div class="avatar-title bg-soft-success text-success fs-22 rounded">
                            <a href="#"><i class="ri-arrow-right-up-fill"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card card-animate">
            <div class="card-body">
                <div class="d-flex">
                    <div class="flex-grow-1">
                        <h6 class="text-muted mb-3">Selecciona Compras</h6>
                    </div>
                    <div class="flex-shrink-0 avatar-sm">
                        <div class="avatar-title bg-soft-warning text-warning fs-22 rounded">
                            <a href="#"><i class="ri-arrow-left-down-fill"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('percentageInput').addEventListener('input', function() {
        var percentage = parseFloat(this.value);
        var result = document.querySelector('#resultValue .counter-value');
        result.setAttribute('data-target', percentage);
        result.textContent = percentage;
    });
</script>

@endsection

col-xl-6
