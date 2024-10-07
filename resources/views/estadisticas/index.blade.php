@extends('dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
                <form method="GET" action="{{ route('estadisticas.index') }}">
            <div class="row mb-4">
                <div class="col">
                    <label for="desde">Desde:</label>
                    <input type="date" name="desde" id="desde" class="form-control" value="{{ request('desde') }}">
                </div>
                <div class="col">
                    <label for="hasta">Hasta:</label>
                    <input type="date" name="hasta" id="hasta" class="form-control" value="{{ request('hasta') }}">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mt-4">Filtrar</button>
                </div>
            </div>
        </form>

        <div class="card mb-4">
            <div class="card-header">Productos más vendidos</div>
            <div class="card-body">
                <canvas id="productosMasVendidosChart"></canvas>
            </div>
        </div>


        <div class="card">
            <div class="card-header">Ingresos de productos</div>
            <div class="card-body">
                <canvas id="productosIngresadosChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
   
    const labelsVendidos = {!! json_encode($productosMasVendidos->pluck('descripcion')) !!};
    const fechasVendidos = {!! json_encode($productosMasVendidos->pluck('fecha')) !!}; 

    const dataVendidos = {
        labels: labelsVendidos.map((descripcion, index) => `${descripcion} (${fechasVendidos[index]})`),
        datasets: [{
            label: 'Cantidad Vendida',
            data: {!! json_encode($productosMasVendidos->pluck('total_vendido')) !!},
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };

    const configVendidos = {
        type: 'bar',
        data: dataVendidos,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            const index = tooltipItem.dataIndex;
                            return `${labelsVendidos[index]} (${fechasVendidos[index]}): ${tooltipItem.formattedValue}`;
                        }
                    }
                }
            }
        }
    };

    const productosMasVendidosChart = new Chart(
        document.getElementById('productosMasVendidosChart'),
        configVendidos
    );

    
    const labelsIngresados = {!! json_encode($productosIngresados->pluck('descripcion')) !!};
    const fechasIngresados = {!! json_encode($productosIngresados->pluck('fecha')) !!}; 

    const dataIngresados = {
        labels: labelsIngresados.map((descripcion, index) => `${descripcion} (${fechasIngresados[index]})`),
        datasets: [{
            label: 'Cantidad Ingresada',
            data: {!! json_encode($productosIngresados->pluck('total_ingresado')) !!},
            backgroundColor: 'rgba(75, 192, 192, 0.6)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };

    const configIngresados = {
        type: 'bar',
        data: dataIngresados,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            const index = tooltipItem.dataIndex;
                            return `${labelsIngresados[index]} (${fechasIngresados[index]}): ${tooltipItem.formattedValue}`;
                        }
                    }
                }
            }
        }
    };

    const productosIngresadosChart = new Chart(
        document.getElementById('productosIngresadosChart'),
        configIngresados
    );
</script>
@endsection
