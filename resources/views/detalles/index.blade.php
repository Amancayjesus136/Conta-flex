@extends('layouts.admin')

@section('content')

    <div class="row justify-content-center">
        <div class="col-xxl-9">
            <div class="card" id="demo">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-header border-bottom-dashed p-4">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <img src="assets/images/logo2.jpg " class="card-logo card-logo-dark" alt="logo dark" height="50">
                                    <div class="mt-sm-5 mt-4">
                                        <h6 class="text-muted text-uppercase fw-semibold">BLUE HOUSE</h6>
                                        <p class="text-muted mb-1" id="address-details">RUC 20547485743</p>
                                        <p class="text-muted mb-0" id="zip-code"><span>FORMULARIO 621 - </span> FEBRERO 2023</p>
                                        <p class="text-muted mb-1" id="address-details">LIQUIDACION DE IMPUESTOS</p>
                                        <p class="text-muted mb-1" id="address-details">PERIODO: 02-2023</p>
                                        <p class="text-muted mb-1" id="address-details">REGIMEN: GENERAL</p>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 mt-sm-0 mt-3">
                                    <h6><span class="text-muted fw-normal">Legal Registration N°:</span><span id="legal-register-no">987654</span></h6>
                                    <h6><span class="text-muted fw-normal">Email:</span><span id="email">{{ Auth::user()->email }}</span></h6>
                                    <h6><span class="text-muted fw-normal">Website:</span> <a href="#" class="link-primary" target="_blank" id="website">www.contaFlex.pe</a></h6>
                                </div>
                            </div>
                        </div>
                        <!--end card-header-->
                    </div><!--end col-->
                    <div class="col-lg-12">
                       
                        <!--end card-body-->
                    </div><!--end col-->
                    <div class="col-lg-12">
                        <div class="card-body p-4 border-top border-top-dashed">
                            <div class="row g-3">
                                <div class="col-12">
                                    <h6 class="text-muted text-uppercase fw-semibold mb-3 text-center">DETERMINACIÓN DE LA DEUDA</h6>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-body-->
                    </div><!--end col-->
                    <div class="col-lg-12">
                        <div class="card-body p-4">
                            <div class="table-responsive">
                                <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                    <thead>
                                        <tr class="table-active">
                                            <th scope="col" style="width: 50px;">#</th>
                                            <th scope="col"></th>
                                            <th scope="col">Compras</th>
                                            <th scope="col">Ventas</th>
                                        </tr>
                                    </thead>
                                    <tbody id="products-list">
                                        <tr>
                                            <th scope="row">01</th>
                                            <td class="text-start">
                                                <span class="fw-medium">Base Imponible</span>
                                            </td>
                                            <td>{{ number_format($total1, 2, '.', '') }}</td>
                                            <td>{{ number_format($sumBase, 2, '.', '') }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">02</th>
                                            <td class="text-start">
                                                <span class="fw-medium">Factura agregadas</span>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">03</th>
                                            <td class="text-start">
                                                <span class="fw-medium">Nueva base compras</span>
                                            </td>
                                            <td>{{ round($total1) }}</td>
                                            <td>{{ round($sumBase) }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">04</th>
                                            <td class="text-start">
                                                <span class="fw-medium">IGV</span>
                                            </td>
                                            <td>{{ ($total2) }}</td>
                                            <td>{{ ($sumIGV) }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">05</th>
                                            <td class="text-start">
                                                <span class="fw-medium">IGV por Pagar</span>
                                            </td>
                                                <td>{{ abs(round($total2 - $sumIGV)) }}</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">06</th>
                                            <td class="text-start">
                                                <span class="fw-medium">Saldo Anterior</span>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">07</th>
                                            <td class="text-start">
                                                <span class="fw-medium">Saldos Comprobantes Retencion</span>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">08</th>
                                            <td class="text-start">
                                                <span class="fw-medium">Sados Comprobantes Percepcion</span>
                                            </td>
                                            <td>0</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">09</th>
                                            <td class="text-start">
                                                <span class="fw-medium">Total IGV por Pagar</span>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table><br><br><br><br><br>

                                <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                    <thead>
                                        <tr class="table-active">
                                            <th scope="col">Renta</th>
                                            <th scope="col">Ventas</th>
                                        </tr>
                                    </thead>
                                    <tbody id="products-list">
                                        <tr>
                                            <td>Base Imponible</td>
                                            <td>{{ round($sumBase) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total renta por pagar</td>
                                            <td>{{ round($sumBase * 1.5 / 100) }}</td>
                                        </tr>
                                    </tbody>
                                </table><br><br>

                                <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                    <thead>
                                        <tr class="table-active">
                                            <th scope="col"></th>
                                            <th scope="col">Modificado</th>
                                            <th scope="col">Original</th>
                                        </tr>
                                    </thead>
                                    <tbody id="products-list">
                                        <tr>
                                            <td class="text-start">
                                                <span class="fw-medium">IGV por Pagar</span>
                                            </td>
                                            <td>{{ abs(round($total2 - $sumIGV)) }}</td>
                                            <td>{{ abs(round($total2 - $sumIGV)) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">
                                                <span class="fw-medium">Renta por pagar</span>
                                            </td>
                                            <td>{{ round($sumBase * 1.5 / 100) }}</td>
                                            <td>{{ round($sumBase * 1.5 / 100) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">
                                                <span class="fw-medium">Otros</span>
                                            </td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">
                                                <span class="fw-medium">EsSalud</span>
                                            </td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">
                                                <span class="fw-medium">AFP</span>
                                            </td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">
                                                <span class="fw-medium">Contador</span>
                                            </td>
                                            <td>0</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td class="text-start">
                                                <span class="fw-medium">Total a pagar</span>
                                            </td>
                                            <td><strong>{{ round($sumBase * 1.5 / 100) }}</strong></td>
                                            <td><strong>{{ round($sumBase * 1.5 / 100) }}</strong></td>
                                        </tr>
                                    </tbody>
                                </table><br><br><br>
                            </div>
                            
                            <div class="mt-3">
                                <h6 class="text-muted text-uppercase fw-semibold mb-3">Detalles finales:</h6>
                                <p class="text-muted mb-1">Sistema: <span class="fw-medium" id="payment-method">ContaFlex</span></p>
                                <p class="text-muted mb-1">Propietario: <span class="fw-medium" id="card-holder-name">{{ Auth::user()->name }}</span></p>
                                <p class="text-muted">Cantidad total: <span class="fw-medium" id="">$</span><span id="card-total-amount"><td><strong>{{ round($sumBase * 1.5 / 100) }}</strong></td></span></p>
                            </div>
                            
                            <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                <a href="javascript:window.print()" class="btn btn-success"><i class="ri-printer-line align-bottom me-1"></i> Print</a>
                            </div>
                        </div>
                        <!--end card-body-->
                    </div><!--end col-->
                </div><!--end row-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>

@endsection
