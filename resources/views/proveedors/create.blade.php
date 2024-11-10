@extends('../dashboard')

@section('content')

<div class="row justify-content-center mt-3">
            @if($errors->any())
            <div class="alert alert-warning" role="alert">
                {{$errors->first()}}
            </div>
        @endif
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Registrar Proveedor
                </div>
                <div class="float-end">
                    <a href="{{ route('proveedors.index') }}" class="btn btn-primary btn-sm">&larr; Atras</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('proveedors.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-end text-start">Nombre</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}">
                                @if ($errors->has('nombre'))
                                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                @endif
                            </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="telefono" class="col-md-4 col-form-label text-md-end text-start">Telefono</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ old('telefono') }}" pattern="[0-9]*">
                                @if ($errors->has('telefono'))
                                    <span class="text-danger">{{ $errors->first('telefono') }}</span>
                                @endif
                            </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="direccionComercial" class="col-md-4 col-form-label text-md-end text-start">Direccion Comercial</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('direccionComercial') is-invalid @enderror" id="direccionComercial" name="direccionComercial" value="{{ old('direccionComercial') }}">
                                @if ($errors->has('direccionComercial'))
                                    <span class="text-danger">{{ $errors->first('direccionComercial') }}</span>
                                @endif
                            </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="cuit" class="col-md-4 col-form-label text-md-end text-start">CUIT</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('cuit') is-invalid @enderror" id="cuit" name="CUIT" value="{{ old('CUIT') }}">
                            @if ($errors->has('cuit'))
                                <span class="text-danger">{{ $errors->first('cuit') }}</span>
                            @endif
                        </div>
                    </div>
                        <div class="mb-3 row">
                        <label for="direccionComercial" class="col-md-4 col-form-label text-md-end text-start">Ciudad</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('Ciudad') is-invalid @enderror" id="Ciudad" name="ciudad" value="{{ old('Ciudad') }}">
                                @if ($errors->has('Ciudad'))
                                    <span class="text-danger">{{ $errors->first('Ciudad') }}</span>
                                @endif
                            </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Añadir Proveedor">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
@vite('resources/js/appAux.js')  
@endsection