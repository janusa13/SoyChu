@extends('../dashboard')
@section('content')
<div class="container">
    <h1>Registrar Envío</h1>

    <form action="{{ route('envios.store') }}" method="POST">
        @csrf
         @if($errors->any())
                    <div class="alert alert-warning" role="alert">
                        {{$errors->first()}}
                    </div>
                @endif
        <div class="mb-3">
            <label for="product_id" class="form-label">Producto</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="">Seleccione un producto</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="sucursal_id" class="form-label">Sucursal</label>
            <select name="sucursal_id" id="sucursal_id" class="form-control" required>
                <option value="">Seleccione una sucursal</option>
                @foreach ($sucursals as $sucursal)
                    <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Cantidad</label>
            <input type="number" name="cantidad" id="quantity" class="form-control" min="1" required>
        </div>

        <div class="mb-3">
            <label for="shipped_at" class="form-label">Fecha de Envío</label>
            <input type="date" name="enviado_at" id="shipped_at" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Registrar Envío</button>
    </form>
</div>
@endsection
