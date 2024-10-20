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
            <div class="card-header">Lista de clientes</div>
            <div class="card-body">
                <a href="{{route('clientes.create')}}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Registrar Cliente: </a>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nombre Fantasia</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Localidad</th>
                            <th scope="col">Correo Electronico</th>
                            <th scope="col">Numero Laboral</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nombreFantasia }}</td>
                            <td>{{ $cliente->nombre }}</td>
                            <td>{{ $cliente->apellido }}</td>
                            <td>{{ $cliente->localidad }}</td>
                            <td>{{ $cliente->correoElectronico }}</td>
                            <td>{{ $cliente->celularLaboral }}</td>
                            <td>
                                <form action="{{route('clientes.destroy',$cliente->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i>Informacion</a>
                                    <a href="" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Quieres borrar este proveedor?');"><i class="bi bi-trash"></i> Borrar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No hay clientes registrados</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                </table>
                {{ $clientes->links() }}
            </div>
        </div>
    </div>    
</div>
@vite('resources/js/appAux.js')
@endsection
