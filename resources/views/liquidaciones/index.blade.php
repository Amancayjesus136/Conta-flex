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
                                    <h6><span class="text-muted fw-normal">Legal Registration No:</span><span id="legal-register-no">987654</span></h6>
                                    <h6><span class="text-muted fw-normal">Email:</span><span id="email">velzon@themesbrand.com</span></h6>
                                    <h6><span class="text-muted fw-normal">Website:</span> <a href="https://themesbrand.com/" class="link-primary" target="_blank" id="website">www.themesbrand.com</a></h6>
                                    <h6 class="mb-0"><span class="text-muted fw-normal">Contact No: </span><span id="contact-no"> +(01) 234 6789</span></h6>
                                </div>
                            </div>
                        </div>
                        <!--end card-header-->
                    </div><!--end col-->
                    <div class="col-lg-12">
                        <div class="card-body p-4">
                            <div class="row g-3">
                                <div class="col-lg-3 col-6">
                                    <p class="text-muted mb-2 text-uppercase fw-semibold">RENTA</p>
                                    <h5 class="fs-14 mb-0">#<span id="invoice-no">2018</span></h5>
                                </div>

                                <div class="col-lg-3 col-6">
                                    <p class="text-muted mb-2 text-uppercase fw-semibold">´Porcentaje</p>
                                    <h5 class="fs-14 mb-0"><span id="total-amount">0.0150</span></h5>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
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
                                            <th scope="col">Product Details</th>
                                            <th scope="col">Rate</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col" class="text-end">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody id="products-list">
                                        <tr>
                                            <th scope="row">01</th>
                                            <td class="text-start">
                                                <span class="fw-medium">Sweatshirt for Men (Pink)</span>
                                                <p class="text-muted mb-0">Graphic Print Men & Women Sweatshirt</p>
                                            </td>
                                            <td>$119.99</td>
                                            <td>02</td>
                                            <td class="text-end">$239.98</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">02</th>
                                            <td class="text-start">
                                                <span class="fw-medium">Noise NoiseFit Endure Smart Watch</span>
                                                <p class="text-muted mb-0">32.5mm (1.28 Inch) TFT Color Touch Display</p>
                                            </td>
                                            <td>$94.99</td>
                                            <td>01</td>
                                            <td class="text-end">$94.99</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">03</th>
                                            <td class="text-start">
                                                <span class="fw-medium">350 ml Glass Grocery Container</span>
                                                <p class="text-muted mb-0">Glass Grocery Container (Pack of 3, White)</p>
                                            </td>
                                            <td>$24.99</td>
                                            <td>01</td>
                                            <td class="text-end">$24.99</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">04</th>
                                            <td class="text-start">
                                                <span class="fw-medium">Fabric Dual Tone Living Room Chair</span>
                                                <p class="text-muted mb-0">Chair (White)</p>
                                            </td>
                                            <td>$340.00</td>
                                            <td>01</td>
                                            <td class="text-end">$340.00</td>
                                        </tr>
                                    </tbody>
                                </table><!--end table-->
                            </div>
                            <div class="border-top border-top-dashed mt-2">
                                <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width:250px">
                                    <tbody>
                                        <tr>
                                            <td>Sub Total</td>
                                            <td class="text-end">$699.96</td>
                                        </tr>
                                        <tr>
                                            <td>Estimated Tax (12.5%)</td>
                                            <td class="text-end">$44.99</td>
                                        </tr>
                                        <tr>
                                            <td>Discount <small class="text-muted">(VELZON15)</small></td>
                                            <td class="text-end">- $53.99</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping Charge</td>
                                            <td class="text-end">$65.00</td>
                                        </tr>
                                        <tr class="border-top border-top-dashed fs-15">
                                            <th scope="row">Total Amount</th>
                                            <th class="text-end">$755.96</th>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--end table-->
                            </div>
                            <div class="mt-3">
                                <h6 class="text-muted text-uppercase fw-semibold mb-3">Payment Details:</h6>
                                <p class="text-muted mb-1">Payment Method: <span class="fw-medium" id="payment-method">Mastercard</span></p>
                                <p class="text-muted mb-1">Card Holder: <span class="fw-medium" id="card-holder-name">David Nichols</span></p>
                                <p class="text-muted mb-1">Card Number: <span class="fw-medium" id="card-number">xxx xxxx xxxx 1234</span></p>
                                <p class="text-muted">Total Amount: <span class="fw-medium" id="">$ </span><span id="card-total-amount">755.96</span></p>
                            </div>
                            <div class="mt-4">
                                <div class="alert alert-info">
                                    <p class="mb-0"><span class="fw-semibold">NOTES:</span>
                                        <span id="note">All accounts are to be paid within 7 days from receipt of invoice. To be paid by cheque or
                                            credit card or direct payment online. If account is not paid within 7
                                            days the credits details supplied as confirmation of work undertaken
                                            will be charged the agreed quoted fee noted above.
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                <a href="javascript:window.print()" class="btn btn-success"><i class="ri-printer-line align-bottom me-1"></i> Print</a>
                                <a href="javascript:void(0);" class="btn btn-primary"><i class="ri-download-2-line align-bottom me-1"></i> Download</a>
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
