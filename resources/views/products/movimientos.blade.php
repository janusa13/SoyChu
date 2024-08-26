@extends('../dashboard')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">
        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Movimientos del Producto: {{ $product->descripcion }}</div>
            <div class="card-body">
                <h5>Detalles del Producto</h5>
                <p><strong>Descripción:</strong> {{ $product->descripcion }}</p>
                <p><strong>Cantidad Total:</strong> {{ $product->cantidad }}</p>

                <hr>

                <!-- Ingresos de Stock -->
                <h5>Ingresos de Stock</h5>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Factura</th>
                            <th scope="col">Cantidad CJ</th>
                            <th scope="col">Proveedor</th>
                            <th scope="col">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ingresoProductos as $ingreso)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ingreso->factura->numero }}</td>
                                <td>{{ $ingreso->CantidadCJ }}</td>
                                <td>{{ $ingreso->factura->proveedor->nombre }}</td>
                                <td>{{ $ingreso->factura->fecha }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <span class="text-danger"><strong>No se encontraron ingresos de stock.</strong></span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <hr>

                <!-- Envíos -->
                <h5>Envíos</h5>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Sucursal</th>
                            <th scope="col">Cantidad CJ</th>
                            <th scope="col">Fecha de Envío</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($envios as $envio)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $envio->sucursal->nombre }}</td>
                                <td>{{ $envio->cantidad }}</td>
                                <td>{{ \Carbon\Carbon::parse($envio->enviado_at)->format('Y-m-d') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <span class="text-danger"><strong>No se encontraron envíos.</strong></span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <hr>

                <!-- Facturas Generadas -->
                <h2>Facturas Generadas</h2>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Factura</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Cantidad CJ</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Total</th>
                            <th scope="col">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($facturaClienteProductos as $facturaClienteProducto)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $facturaClienteProducto->facturaCliente->numero }}</td>
                                <td>{{ $facturaClienteProducto->facturaCliente->cliente->nombre }}</td>
                                <td>{{ $facturaClienteProducto->cantidad_cj }}</td>
                                <td>{{ $facturaClienteProducto->precio }}</td>
                                <td>{{ $facturaClienteProducto->cantidad_cj * $facturaClienteProducto->precio }}</td>
                                <td>{{ $facturaClienteProducto->facturaCliente->fecha }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">
                                    <span class="text-danger"><strong>No se encontraron facturas generadas.</strong></span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <hr>

                <a href="{{ route('products.index') }}" class="btn btn-primary">Volver a Productos</a>
            </div>
        </div>
    </div>    
</div>

@endsection
