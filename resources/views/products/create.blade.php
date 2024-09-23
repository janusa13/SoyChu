@extends('../dashboard')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Añadir productos
                </div>
                <div class="float-end">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Atras</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('products.store') }}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="descripcion" class="col-md-4 col-form-label text-md-end text-start">Producto:</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" value="{{ old('descripcion') }}">
                            @if ($errors->has('descripcion'))
                                <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="rubro" class="col-md-4 col-form-label text-md-end text-start">Rubro:</label>
                        <div class="col-md-6">
                            <select name="rubro" class="form-control" required>
                                <option value="">Selecionar Rubro </option>
                                <option value="Pollos">Pollos</option>
                                <option value="Lacteos">Lacteos</option>
                                <option value="Rebosados">Rebosados</option>
                                <option value="Otros...">Otros...</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Añadir Producto">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
@vite('resources/js/appAux.js')
@endsection