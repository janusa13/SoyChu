<?php
    $dateHoy = date('Y-m-d');
    $dateVencimiento = date('Y-m-d', strtotime('+1 month'));
?>
@extends('../dashboard')
@section('content')
<div class="container">
    <h1>Registrar Factura</h1>

    <form action="{{route('factura.store')}}" method="POST">
        @csrf
        @if($errors->any())
            <div class="alert alert-warning" role="alert">
                {{$errors->first()}}
            </div>
        @endif
        <div class="mb-3">
            <label for="proveedor" class="form-label">Proveedor</label>
            <select name="proveedor" id="proveedor" class="form-control" required>
                <option value="">Seleccione un Proveedor</option>
                @foreach ($proveedors as $proveedor)
                    <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="numero" class="form-label">Numero de factura</label>
            <input type="text" name="numero" id="numero" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="product_id" class="form-label">Metodo de Pago</label>
                            <select name="condicion_pago" class="form-control" required>
                                <option value="">Seleccione un metodo de pago</option>
                                    <option value="dinero en efectivo">Dinero en efectivo</option>
                                    <option value="tarjeta de debito">Tarjeta de debito</option>
                                    <option value="tarjeta de credito">Tarjeta de credito</option>
                                    <option value="transferencia bancaria">Transferencia Bancaria</option>
                                    <option value="pago electronico">Pago electronico</option>
                            </select>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo($dateHoy) ;?>" required>
        </div>

        <div class="mb-3">
            <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento</label>
            <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" value = "<?php echo($dateVencimiento) ;?>" required>
        </div>

        <div id="productos-container">
            <div class="producto mb-4 p-3 border rounded">
                <strong>Ingresar Producto</strong>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="product_id" class="form-label">Producto</label>
                            <select name="product_id[]" class="form-control" required>
                                <option value="">Seleccione un producto</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->descripcion }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="kilosPorUnidad" class="form-label">Kilos por unidad:</label>
                            <input type="number" name="kilosPorUnidad[]" id="kilosPorUnidad" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="cantidadCJ" class="form-label">Cantidad CJ:</label>
                            <input type="number" name="cantidadCJ[]" id="cantidadCJ" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio:</label>
                            <input type="number" name="precio[]" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" id="add-producto" class="btn btn-secondary">+ Producto</button>
        <button type="button" id="remove-producto" class="btn btn-danger">- Producto</button>
        <button type="submit" class="btn btn-primary">Registrar Factura</button>
    </form>
</div>
@vite('resources/js/app.js')
@endsection
