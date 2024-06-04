@extends('../dashboard')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Informacion de la Sucursal.
                </div>
                <div class="float-end">
                    <a href="{{ route('sucursals.index') }}" class="btn btn-primary btn-sm">&larr; atras</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Nombre:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $sucursal->nombre }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Direccion:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $sucursal->direccion }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"><strong>Telefono:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $sucursal->telefono }}
                        </div>
                    </div>
            </div>
        </div>
    </div>    
</div>
    
@endsection