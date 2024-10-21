@extends('../dashboard')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Registrar Cliente
                </div>
                <div class="float-end">
                    <a href="{{ route('clientes.index') }}" class="btn btn-primary btn-sm">&larr; Atras</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('clientes.update', $cliente->id) }}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="mb-3 row">
                        <div class="personal-container mb-4 p-3 border rounded">
                            <strong>Informacion personal: </strong>
                            <div class="mb-3 row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-end text-start">Nombre</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ $cliente->nombre }}">
                                        @if ($errors->has('nombre'))
                                            <span class="text-danger">{{ $errors->first('nombre') }}</span>
                                        @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="apellido" class="col-md-4 col-form-label text-md-end text-start">Apellido</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="apellido" name="apellido" value="{{ $cliente->apellido }}">
                                        @if ($errors->has('apellido'))
                                            <span class="text-danger">{{ $errors->first('apelldio') }}</span>
                                        @endif
                                </div>
                            </div>
                        </div>

                        <div class="localizacion-container mb-4 p-3 border rounded">
                            <strong>Informacion de Localizacion: </strong>
                            <div class="mb-3 row">
                                <label for="provincia" class="col-md-4 col-form-label text-md-end text-start">Provincia</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('provincia') is-invalid @enderror" id="provincia" name="provincia" value="{{ $cliente->provincia }}">
                                        @if ($errors->has('provincia'))
                                            <span class="text-danger">{{ $errors->first('provincia') }}</span>
                                        @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="localidad" class="col-md-4 col-form-label text-md-end text-start">Localidad</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('localidad') is-invalid @enderror" id="localidad" name="localidad" value="{{ $cliente->localidad }}">
                                        @if ($errors->has('localidad'))
                                            <span class="text-danger">{{ $errors->first('localidad') }}</span>
                                        @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="calleYNumero" class="col-md-4 col-form-label text-md-end text-start">Calle y Numero</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('calleYNumero') is-invalid @enderror" id="calleYNumero" name="calleYNumero" value="{{ $cliente->calleYNumero}}">
                                        @if ($errors->has('calleYNumero'))
                                            <span class="text-danger">{{ $errors->first('calleYNumero') }}</span>
                                        @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="codigoPostal" class="col-md-4 col-form-label text-md-end text-start">Codigo Postal</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('codigoPostal') is-invalid @enderror" id="codigoPostal" name="codigoPostal" value="{{ $cliente->codigoPostal }}">
                                        @if ($errors->has('codigoPostal'))
                                            <span class="text-danger">{{ $errors->first('codigoPostal') }}</span>
                                        @endif
                                </div>
                            </div>
                        </div>

                        <div class="contacto-container mb-4 p-3 border rounded">
                            <strong>Informacion de Contacto</strong>
                            <div class="mb-3 row">
                                <label for="numeroCelular" class="col-md-4 col-form-label text-md-end text-start">Numero de celular personal </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('numeroCelular') is-invalid @enderror" id="numeroCelular" name="numeroCelular" value="{{ $cliente->numeroCelular }}">
                                        @if ($errors->has('numeroCelular'))
                                            <span class="text-danger">{{ $errors->first('numeroCelular') }}</span>
                                        @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="celularLaboral" class="col-md-4 col-form-label text-md-end text-start">Numero de celular laboral</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('celularLaboral') is-invalid @enderror" id="celularLaboral" name="celularLaboral" value="{{ $cliente->celularLaboral }}">
                                        @if ($errors->has('celularLaboral'))
                                            <span class="text-danger">{{ $errors->first('celularLaboral') }}</span>
                                        @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="correoElectronico" class="col-md-4 col-form-label text-md-end text-start">Correo Electronio</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('correoElectronico') is-invalid @enderror" id="correoElectronico" name="correoElectronico" value="{{ $cliente->correoElectronico }}">
                                        @if ($errors->has('correoElectronico'))
                                            <span class="text-danger">{{ $errors->first('correoElectronico') }}</span>
                                        @endif
                                </div>
                            </div>
                        </div>

                        <div class="facturacion-container mb-4 p-3 border rounded">
                            <strong>Informacion de Facturacion:</strong>
                            <div class="mb-3 row">
                                <label for="nombreFantasia" class="col-md-4 col-form-label text-md-end text-start">Nombre Fantasia</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('nombreFantasia') is-invalid @enderror" id="nombreFantasia" name="nombreFantasia" value="{{ $cliente->nombreFantasia }}">
                                        @if ($errors->has('nombreFantasia'))
                                            <span class="text-danger">{{ $errors->first('nombreFantasia') }}</span>
                                        @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="categoriaIVA" class="col-md-4 col-form-label text-md-end text-start">Categoria IVA</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('categoriaIVA') is-invalid @enderror" id="categoriaIVA" name="categoriaIVA" value="{{ $cliente->categoriaIVA }}">
                                        @if ($errors->has('categoriaIVA'))
                                            <span class="text-danger">{{ $errors->first('categoriaIVA') }}</span>
                                        @endif
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="cuit" class="col-md-4 col-form-label text-md-end text-start">CUIT</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control @error('cuit') is-invalid @enderror" id="cuit" name="cuit" value="{{ $cliente->cuit }}">
                                        @if ($errors->has('cuit'))
                                            <span class="text-danger">{{ $errors->first('cuit') }}</span>
                                        @endif
                                </div>
                            </div>
                        </div>
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Editar Cliente">
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>
@vite('resources/js/appAux.js')
@endsection