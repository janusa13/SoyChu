<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EstadisticaController extends Controller
{
public function index(Request $request)
{
    $desde = $request->input('desde');
    $hasta = $request->input('hasta');

    \Log::info('Fechas recibidas:', ['desde' => $desde, 'hasta' => $hasta]); // Para verificar qué fechas llegan

    // Consulta para productos más vendidos
    $productosMasVendidosQuery = DB::table('factura_cliente_productos')
        ->join('products', 'factura_cliente_productos.product_id', '=', 'products.id')
        ->join('facturas_clientes', 'factura_cliente_productos.factura_cliente_id', '=', 'facturas_clientes.id')
        ->select('products.descripcion', DB::raw('SUM(factura_cliente_productos.cantidad_cj) as total_vendido'))
        ->groupBy('products.descripcion')
        ->orderBy('total_vendido', 'DESC');

    // Consulta para productos ingresados
    $productosIngresadosQuery = DB::table('ingresoproducto')
        ->join('products', 'ingresoproducto.productID', '=', 'products.id')
        ->join('factura', 'ingresoproducto.facturaID', '=', 'factura.id')
        ->select('products.descripcion', DB::raw('SUM(ingresoproducto.cantidadCJ) as total_ingresado'))
        ->groupBy('products.descripcion')
        ->orderBy('total_ingresado', 'DESC');

    // Filtrar por fechas si están definidas
    if ($desde && $hasta) {
        \Log::info('Aplicando filtro de fechas');

        // Filtrar productos más vendidos por el rango de fechas en facturas_clientes
        $productosMasVendidosQuery->whereBetween('facturas_clientes.fecha', [$desde, $hasta]);
        
        // Filtrar productos ingresados por el rango de fechas en facturas
        $productosIngresadosQuery->whereBetween('factura.fecha', [$desde, $hasta]);
    }

    // Obtener los resultados
    $productosMasVendidos = $productosMasVendidosQuery->get();
    $productosIngresados = $productosIngresadosQuery->get();

    \Log::info('Resultados obtenidos:', ['productosMasVendidos' => $productosMasVendidos, 'productosIngresados' => $productosIngresados]);

    return view('estadisticas.index', compact('productosMasVendidos', 'productosIngresados'));
}


}
