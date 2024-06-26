@extends('../dashboard')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Informacion del cliente.
                </div>
                <div class="float-end">
                    <a href="" class="btn btn-primary btn-sm">&larr; atras</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label  class="col-md-4 col-form-label text-md-end text-start"><strong>Nombre:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $cliente->nombre }}
                        </div>
                    </div>

                    <div class="row">
                        <label  class="col-md-4 col-form-label text-md-end text-start"><strong>Apelldio:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $cliente->apellido }}
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-4 col-form-label text-md-end text-start"><strong>Numero de telefono Laboral:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $cliente->celularLaboral }}
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-4 col-form-label text-md-end text-start"><strong>Numero de telefono personal:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $cliente->numeroCelular}}
                        </div>
                    </div>

                    <div class="row">
                        <label  class="col-md-4 col-form-label text-md-end text-start"><strong>Provincia:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $cliente->provincia }}
                        </div>
                    </div>

                    <div class="row">
                        <label  class="col-md-4 col-form-label text-md-end text-start"><strong>Localidad:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $cliente->localidad }}
                        </div>
                    </div>

                    <div class="row">
                        <label  class="col-md-4 col-form-label text-md-end text-start"><strong>Calle y Numero:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $cliente->calleYnumero }}
                        </div>
                    </div>

                    <div class="row">
                        <label  class="col-md-4 col-form-label text-md-end text-start"><strong>Calle y Numero:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $cliente->codigoPostal }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"><strong>Calle y Numero:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $cliente->nombreFantasia }}
                        </div>
                    </div>


                    <div class="row">
                        <label  class="col-md-4 col-form-label text-md-end text-start"><strong>CUIT:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $cliente->cuit }}
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-md-4 col-form-label text-md-end text-start"><strong>Categoria IVA:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $cliente->categoriaIVA }}
                        </div>
                    </div>
            </div>
        </div>
    </div>    
</div>
    
@endsection