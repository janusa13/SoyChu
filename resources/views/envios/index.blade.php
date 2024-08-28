@extends('../dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <a href="{{ route('envios.create') }}" class="btn btn-primary btn-sm my-2"><i class="bi bi-box-arrow-in-right"></i> Registrar Envío: </a>
                <div class="card-header">Lista de Envíos</div>

                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Sucursal</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Fecha de Envío</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($envios as $envio)
                            <tr>
                                <th scope="row">{{ $envio->id }}</th>
                                <td>{{ $envio->product->descripcion }}</td>
                                <td>{{ $envio->sucursal->nombre }}</td>
                                <td>{{ $envio->cantidad }}</td>
                                <td>{{ $envio->enviado_at }}</td>
                            </tr>
                            @empty
                                <td colspan="5">
                                    <span class="text-danger">
                                        <strong>No hay envíos registrados!</strong>
                                    </span>
                                </td>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $envios->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@vite('resources/js/appAux.js')
@endsection
