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
            <div class="card-header">Lista de sucursales</div>
            <div class="card-body">
                <a href="{{ route('sucursals.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Añadir sucursal: </a>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Telefono</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sucursals as $sucursal)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $sucursal->nombre }}</td>
                            <td>{{ $sucursal->direccion }}</td>
                            <td>{{ $sucursal->telefono }}</td>
                            <td>
                                <form action="{{ route('sucursals.destroy', $sucursal->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('sucursals.show', $sucursal->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i>Informacion</a>
                                    <a href="{{ route('sucursals.edit', $sucursal->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Quieres borrar este producto?');"><i class="bi bi-trash"></i> Borrar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No hay sucursales registradas!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $sucursals->links() }}

            </div>
        </div>
    </div>    
</div>
@vite('resources/js/appAux.js')
@endsection
