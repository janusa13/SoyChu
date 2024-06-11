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
                                    <option value="dinero en efectivo">Dinero en fectivo</option>
                                    <option value="tarjeta de debito">Tarjeta de debito</option>
                                    <option value="tarjeta de credito">Tarjeta de credito</option>
                                    <option value="transferencia bancaria">Transferencia Bancaria</option>
                                    <option value="pago electronico">Pago electronico</option>
                            </select>
        </div>

        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento</label>
            <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" required>
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
                            <input type="number" name="kilosPorUnidad[]" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="cantidadCJ" class="form-label">Cantidad CJ:</label>
                            <input type="number" name="cantidadCJ[]" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="kilosTotal" class="form-label">Kilos Total:</label>
                            <input type="number" name="kilosTotal[]" class="form-control" required>
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

<script>
    document.getElementById('add-producto').addEventListener('click', function() {
        var container = document.getElementById('productos-container');
        var newProduct = container.children[0].cloneNode(true);
        var inputs = newProduct.getElementsByTagName('input');
        var selects = newProduct.getElementsByTagName('select');

        for (var i = 0; i < inputs.length; i++) {
            inputs[i].value = '';
        }
        for (var i = 0; i < selects.length; i++) {
            selects[i].selectedIndex = 0;
        }

        container.appendChild(newProduct);
    });

    document.getElementById('remove-producto').addEventListener('click', function() {
        var container = document.getElementById('productos-container');
        if (container.children.length > 1) {
            container.removeChild(container.lastChild);
        }
    });
</script>
@endsection
