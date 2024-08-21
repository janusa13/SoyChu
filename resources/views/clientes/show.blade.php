@extends('../dashboard')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    <h2>Informacion del cliente.</h2>
                </div>
                <div class="float-end">
                    <a href="{{route('clientes.index')}}" class="btn btn-primary btn-sm">&larr; atras</a>
                </div>
            </div>
            <div class="card-body">
                <div class="personal-container mb-4 p-3 border rounded">
                <strong>Informacion personal: </strong>
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
                </div>
            </div>


                    <div class="localizacion-container mb-4 p-3 border rounded ">
                    <strong>Informacion de Localizacion: </strong>
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
                                {{ $cliente->calleYNumero }}
                            </div>
                        </div>
                        <div class="row">
                            <label  class="col-md-4 col-form-label text-md-end text-start"><strong>Codigo postal:</strong></label>
                            <div class="col-md-6" style="line-height: 35px;">
                                {{ $cliente->codigoPostal }}
                            </div>
                        </div>
                    </div>

                    <div class="contacto-container mb-4 p-3 border rounded">
                    <strong>Informacion de contacto: </strong>
                        <div class="row">
                            <label class="col-md-4 col-form-label text-md-end text-start"><strong>Numero de telefono personal:</strong></label>
                            <div class="col-md-6" style="line-height: 35px;">
                                {{ $cliente->numeroCelular}}
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label text-md-end text-start"><strong>Numero de telefono Laboral:</strong></label>
                            <div class="col-md-6" style="line-height: 35px;">
                                {{ $cliente->celularLaboral }}
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label text-md-end text-start"><strong>Correo Electronico:</strong></label>
                            <div class="col-md-6" style="line-height: 35px;">
                                {{ $cliente->correoElectronico}}
                            </div>
                        </div>
                    </div>
                    <div class="facturacion-container mb-4 p-3 border rounded">
                    <strong>Informacion de Facturacion:</strong>
                    <div class="row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"><strong>Nombre Fantasia:</strong></label>
                            <div class="col-md-6" style="line-height: 35px;">
                                {{ $cliente->nombreFantasia }}
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-4 col-form-label text-md-end text-start"><strong>Categoria IVA:</strong></label>
                            <div class="col-md-6" style="line-height: 35px;">
                                {{ $cliente->categoriaIVA }}
                            </div>
                        </div>
                        <div class="row">
                            <label  class="col-md-4 col-form-label text-md-end text-start"><strong>CUIT:</strong></label>
                            <div class="col-md-6" style="line-height: 35px;">
                                {{ $cliente->cuit }}
                            </div>
                        </div>

                    </div>
            </div>
        </div>
    </div>    
</div>
@vite('resources/js/appAux.js')
@endsection