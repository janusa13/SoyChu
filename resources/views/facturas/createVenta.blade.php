@extends('../dashboard')
@section('content')
<div class="container">
    <h1>Registrar Factura de Cliente</h1>

    <form action="{{route('facturaCliente.store')}}" method="POST">
        @csrf
        @if($errors->any())
            <div class="alert alert-warning" role="alert">
                {{$errors->first()}}
            </div>
        @endif
        <div class="mb-3">
            <label for="cliente" class="form-label">Cliente</label>
            <select name="cliente" id="cliente" class="form-control" required>
                <option value="">Seleccione un Cliente</option>
                @foreach ($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="numero" class="form-label">Número de Factura</label>
            <input type="text" name="numero" id="numero" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="condicion_pago" class="form-label">Método de Pago</label>
            <select name="condicion_pago" class="form-control" required>
                <option value="">Seleccione un método de pago</option>
                <option value="dinero en efectivo">Dinero en efectivo</option>
                <option value="tarjeta de débito">Tarjeta de débito</option>
                <option value="tarjeta de crédito">Tarjeta de crédito</option>
                <option value="transferencia bancaria">Transferencia bancaria</option>
                <option value="pago electrónico">Pago electrónico</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento</label>
            <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" required>
        </div>

        <div id="productos-container">
            <div class="producto mb-4 p-3 border rounded">
                <strong>Ingresar Producto</strong>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="product_id" class="form-label">Producto</label>
                            <select name="product_id[]" class="form-control" required>
                                <option value="">Seleccione un producto</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="kilosPorUnidad" class="form-label">Kilos por Unidad:</label>
                            <input type="number" name="kilosPorUnidad[]" id="kilosPorUnidad" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="cantidadCJ" class="form-label">Cantidad CJ:</label>
                            <input type="number" name="cantidadCJ[]" id="cantidadCJ" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="kilosTotal" class="form-label">Kilos Totales:</label>
                            <input type="number" name="kilosTotal[]" id="kilosTotal" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio:</label>
                            <input type="number" name="precio[]" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" id="add-producto" class="btn btn-secondary">+ Producto</button>
        <button type="button" id="remove-producto" class="btn btn-danger">- Producto</button>
        <button type="submit" class="btn btn-primary">Registrar Factura</button>
    </form>
</div>
@vite('resources/js/app.js')
@endsection
