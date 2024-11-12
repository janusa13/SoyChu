@extends('../dashboard')

@section('content')

<div class=" row justify-content-center mt-3">
    <div class="col-md-8">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Editar datos del Proveedor
                </div>
                <div class="float-end">
                    <a href="{{ route('proveedors.index') }}" class="btn btn-primary btn-sm">&larr; Atras</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('proveedors.update', $proveedor->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-end text-start">Nombre</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ $proveedor->nombre }}">
                            @if ($errors->has('nombre'))
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="telefono" class="col-md-4 col-form-label text-md-end text-start">telefono</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ $proveedor->telefono }}">
                            @if ($errors->has('telefono'))
                                <span class="text-danger">{{ $errors->first('telefono') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="telefono" class="col-md-4 col-form-label text-md-end text-start">Direccion Comercial</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('direccionComercial') is-invalid @enderror" id="direccionComercial" name="direccionComercial" value="{{ $proveedor->direccionComercial }}">
                            @if ($errors->has('direccionComercial'))
                                <span class="text-danger">{{ $errors->first('direccionComercial') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="CUIT" class="col-md-4 col-form-label text-md-end text-start">CUIT</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('CUIT') is-invalid @enderror" id="CUIT" name="CUIT" value="{{ $proveedor->CUIT }}">
                            @if ($errors->has('CUIT'))
                                <span class="text-danger">{{ $errors->first('CUIT') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="ciudad" class="col-md-4 col-form-label text-md-end text-start">ciudad</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('ciudad') is-invalid @enderror" id="ciudad" name="ciudad" value="{{ $proveedor->ciudad }}">
                            @if ($errors->has('ciudad'))
                                <span class="text-danger">{{ $errors->first('ciudad') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Actualizar Sucursal">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
@vite('resources/js/appAux.js')
@endsection