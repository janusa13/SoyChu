@extends('../dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de Facturas</div>

                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Productos</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($facturas as $factura)
                            <tr>
                                <th scope="row">{{ $factura->id }}</th>
                                <td>{{ $factura->cliente->nombre }} <!-- Nombre del cliente --></td>
                                
                                <!-- Mostrar los productos de la factura -->
                                <td>
                                    @foreach($factura->facturaClienteProductos as $productoFactura)
                                        {{ $productoFactura->product->descripcion }} <br>
                                    @endforeach
                                </td>

                                <!-- Mostrar las cantidades de los productos -->
                                <td>
                                    @foreach($factura->facturaClienteProductos as $productoFactura)
                                        {{ $productoFactura->kilos_total }} <br>
                                    @endforeach
                                </td>

                                <td>{{ $factura->fecha }}</td>
                                <td>{{ $factura->facturaTotal }}</td>
                            </tr>
                            @empty
                                <td colspan="6">
                                    <span class="text-danger">
                                        <strong>No hay facturas registradas!</strong>
                                    </span>
                                </td>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $facturas->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection