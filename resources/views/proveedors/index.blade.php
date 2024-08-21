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
            <div class="card-header">Lista de proveedores</div>
            <div class="card-body">
                <a href="{{ route('proveedors.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Registrar Proveedor: </a>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Direccion Comercial</th>
                            <th scope="col">CUIT</th>
                            <th scope="col">Cuidad</th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($proveedors as $proveedor)
                        <tr>
                            <td>{{ $proveedor->nombre }}</td>
                            <td>{{ $proveedor->telefono }}</td>
                             <td>{{ $proveedor->direccionComercial }}</td>
                              <td>{{ $proveedor->CUIT }}</td>
                               <td>{{ $proveedor->ciudad }}</td>
                            <td>
                                <form action="{{ route('proveedors.destroy', $proveedor->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Quieres borrar este proveedor?');"><i class="bi bi-trash"></i> Borrar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No hay proveedores registrados</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                </table>

                {{ $proveedors->links() }}

            </div>
        </div>
    </div>    
</div>
@vite('resources/js/appAux.js')    
@endsection
