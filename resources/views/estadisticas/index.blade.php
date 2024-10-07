@extends('dashboard')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <!-- Gráfico de productos más vendidos -->
        <div class="card mb-4">
            <div class="card-header">Productos más vendidos</div>
            <div class="card-body">
                <canvas id="productosMasVendidosChart"></canvas>
            </div>
        </div>

        <!-- Gráfico de ingresos de productos -->
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
    // Datos para el gráfico de productos más vendidos
    const labelsVendidos = {!! json_encode($productosMasVendidos->pluck('descripcion')) !!};
    const dataVendidos = {
        labels: labelsVendidos,
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
            }
        }
    };

    // Crear el gráfico de productos más vendidos
    const productosMasVendidosChart = new Chart(
        document.getElementById('productosMasVendidosChart'),
        configVendidos
    );

    // Datos para el gráfico de ingresos de productos
    const labelsIngresados = {!! json_encode($productosIngresados->pluck('descripcion')) !!};
    const dataIngresados = {
        labels: labelsIngresados,
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
            }
        }
    };

    // Crear el gráfico de ingresos de productos
    const productosIngresadosChart = new Chart(
        document.getElementById('productosIngresadosChart'),
        configIngresados
    );
</script>
@endsection
