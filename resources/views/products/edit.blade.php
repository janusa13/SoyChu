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
                    Editar datos del Producto
                </div>
                <div class="float-end">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Atras</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('products.update', $product->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="mb-3 row">
                        <label for="descripcion" class="col-md-4 col-form-label text-md-end text-start">Descripción</label>
                        <div class="col-md-6">
                            <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion">{{ $product->descripcion }}</textarea>
                            @if ($errors->has('descripcion'))
                                <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="rubro" class="col-md-4 col-form-label text-md-end text-start">Rubro:</label>
                        <div class="col-md-6">
                            <select name="rubro" class="form-control" required>
                                <option value="">Seleccionar Rubro</option>
                                <option value="pollos" {{ $product->rubro == 'pollos' ? 'selected' : '' }}>Pollos</option>
                                <option value="lacteos" {{ $product->rubro == 'lacteos' ? 'selected' : '' }}>Lacteos</option>
                                <option value="rebosados" {{ $product->rubro == 'rebosados' ? 'selected' : '' }}>Rebosados</option>
                                <option value="otros" {{ $product->rubro == 'otros' ? 'selected' : '' }}>Otros...</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Actualizar">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
@vite('resources/js/appAux.js')
@endsection
