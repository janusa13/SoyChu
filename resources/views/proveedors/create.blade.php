@extends('../dashboard')

@section('content')

<div class="row justify-content-center mt-3">
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
                            <textarea class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono">{{ old('telefono') }}</textarea>
                            @if ($errors->has('telefono'))
                                <span class="text-danger">{{ $errors->first('Telefono') }}</span>
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
    
@endsection