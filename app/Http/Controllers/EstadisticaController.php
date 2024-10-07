<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EstadisticaController extends Controller
{
    public function index()
    {
        $productosMasVendidos = DB::table('factura_cliente_productos')
            ->join('products', 'factura_cliente_productos.product_id', '=', 'products.id')
            ->select('products.descripcion', DB::raw('SUM(factura_cliente_productos.cantidad_cj) as total_vendido'))
            ->groupBy('products.descripcion')
            ->orderBy('total_vendido', 'DESC')
            ->limit(10) 
            ->get();

            $productosIngresados = DB::table('ingresoproducto')
                ->join('products', 'ingresoproducto.productID', '=', 'products.id')
                ->select('products.descripcion', DB::raw('SUM(ingresoproducto.cantidadCJ) as total_ingresado'))
                ->groupBy('products.descripcion')
                ->orderBy('total_ingresado', 'DESC')
                ->limit(10)
                ->get();
        return view('estadisticas.index', compact('productosMasVendidos', 'productosIngresados'));
    }

}
