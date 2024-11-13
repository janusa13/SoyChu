@extends('../dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="GET" action="{{ route('facturas.index') }}" class="mb-3">
                <div class="row">
                    <div class="col-md-3">
                        <label for="fechaDesde">Fecha Desde:</label>
                        <input type="date" class="form-control" id="fechaDesde" name="fechaDesde" value="{{ request('fechaDesde') }}">
                    </div>
                    <div class="col-md-3">
                        <label for="fechaHasta">Fecha Hasta:</label>
                        <input type="date" class="form-control" id="fechaHasta" name="fechaHasta" value="{{ request('fechaHasta') }}">
                    </div>
                    <div class="col-md-2 align-self-end">
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                    </div>
                </div>
            </form>
            <div class="card mb-4">
                <div class="card-header">Lista de Facturas de Clientes</div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Numero de comprobante</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Total de factura</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($facturaClienteProductos as $facturaProducto)
                                <tr>
                                    <th scope="row">{{ $facturaProducto->facturaCliente->numero }}</th>
                                    <td>{{ $facturaProducto->facturaCliente->cliente->nombre }}</td>
                                    <td>{{ $facturaProducto->facturaCliente->fecha }}</td>
                                    <td>${{ number_format($facturaProducto->facturaCliente->facturaTotal, 2) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">
                                        <span class="text-danger"><strong>No hay facturas de clientes registradas!</strong></span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Lista de Facturas de Proveedores</div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Numero de comprobante</th>
                                <th scope="col">Proveedor</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Precio Total</th>
                            </tr>
                        </thead>
                        <tbody>
    @forelse ($ingresoProductos as $ingresoProducto)
        <tr>
            <th scope="row">{{ $ingresoProducto->factura->numero }}</th>
            <td>{{ $ingresoProducto->factura->proveedor->nombre }}</td>
            <td>{{ $ingresoProducto->factura->fecha }}</td>
            <td>${{ number_format($ingresoProducto->precio * $ingresoProducto->CantidadCJ, 2) }}</td>
        </tr>
    @empty
        <tr>
            <td colspan="6">
                <span class="text-danger"><strong>No hay facturas de proveedores registradas!</strong></span>
            </td>
        </tr>
    @endforelse
</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection