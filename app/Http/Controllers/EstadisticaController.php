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


    $productosMasVendidosQuery = DB::table('factura_cliente_productos')
        ->join('products', 'factura_cliente_productos.product_id', '=', 'products.id')
        ->join('facturas_clientes', 'factura_cliente_productos.factura_cliente_id', '=', 'facturas_clientes.id')
        ->select('products.descripcion', DB::raw('SUM(factura_cliente_productos.cantidad_cj) as total_vendido'), 'facturas_clientes.fecha') 
        ->groupBy('products.descripcion', 'facturas_clientes.fecha') 
        ->orderBy('facturas_clientes.fecha', 'ASC'); 

    // Consulta para productos ingresados
    $productosIngresadosQuery = DB::table('ingresoproducto')
        ->join('products', 'ingresoproducto.productID', '=', 'products.id')
        ->join('factura', 'ingresoproducto.facturaID', '=', 'factura.id')
        ->select('products.descripcion', DB::raw('SUM(ingresoproducto.cantidadCJ) as total_ingresado'), 'factura.fecha')
        ->groupBy('products.descripcion', 'factura.fecha')
        ->orderBy('factura.fecha', 'ASC');


    if ($desde && $hasta) {
        $productosMasVendidosQuery->whereBetween('facturas_clientes.fecha', [$desde, $hasta]);
        $productosIngresadosQuery->whereBetween('factura.fecha', [$desde, $hasta]);
    }


    $productosMasVendidos = $productosMasVendidosQuery->get();
    $productosIngresados = $productosIngresadosQuery->get();

    return view('estadisticas.index', compact('productosMasVendidos', 'productosIngresados'));
}



}
