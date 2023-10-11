@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <form id="consultaForm" action="/consultar-tipo-cambio" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Consulta Fecha:</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Consultar</button>
                    </div>
                </form>

                @if(isset($data))
                    @if(isset($data['error']))
                        <div class="alert alert-danger mt-3">
                            <strong>Error:</strong> {{ $data['error'] }}
                        </div>
                    @else
                        <h3 class="text-center mt-4">Resultado:</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th class="bg-white text-black">Compra</th>
                                    <td contenteditable="true" id="compra">{{ $data['compra'] }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-white text-black">Venta</th>
                                    <td contenteditable="true" id="venta">{{ $data['venta'] }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-white text-black">Origen</th>
                                    <td contenteditable="true" id="origen">{{ $data['origen'] }}</td>
                                </tr>
                                <tr>
                                    <th class="bg-white text-black">Fecha</th>
                                    <td contenteditable="true" id="fecha">{{ $data['fecha'] }}</td>
                                </tr>
                            </table>
                        </div>
                        <button class="btn btn-primary mt-3" id="copiarBtn">Copiar Campos</button>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
</style>

<script>
    var copiarBtn = document.getElementById('copiarBtn');

    copiarBtn.addEventListener('click', function() {
        var compra = document.getElementById('compra').innerText;
        var venta = document.getElementById('venta').innerText;

        var texto = `Compra: ${compra}\nVenta: ${venta}`;

        var textarea = document.createElement('textarea');
        textarea.value = texto;
        textarea.style.position = 'fixed';
        document.body.appendChild(textarea);

        textarea.select();
        document.execCommand('copy');

        document.body.removeChild(textarea);

        alert('Campos de compra y venta copiados al portapapeles');
        
        // Recargar la página después de copiar
        location.reload();
    });
</script>



@endsection
