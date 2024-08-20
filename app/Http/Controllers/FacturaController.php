<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Factura;
use App\Models\Proveedor;
use App\Models\IngresoProducto;
use Illuminate\Http\RedirectResponse;
use App\Models\Envio;
use Illuminate\View\View;

class FacturaController extends Controller
{
        public function create() : View
    {
        $products = Product::all();
        $proveedors = Proveedor::all();
        return view('facturas.create', compact('products', 'proveedors'));
    }

    public function store(Request $request){
        $factura = new Factura();
        $factura->proveedor = $request->proveedor;
        $factura->numero = $request->numero;
        $factura->condicion_pago = $request->condicion_pago;
        $factura->fecha = $request->fecha;
        $factura->fecha_vencimiento = $request->fecha_vencimiento;
        $factura->save();

        for($i = 0; $i<count($request->product_id); $i++){
            $producto = new IngresoProducto();
            $producto->facturaID = $factura->id;
            $producto->productID = $request->product_id[$i];
            $producto->kilosPorUnidad = $request->kilosPorUnidad[$i];
            $producto->cantidadCJ = $request->cantidadCJ[$i];
            $producto->kilos = $request->kilosTotal[$i];
            $producto->precio = $request->precio[$i];
            
            $producto->save();
            $product = Product::findOrFail($request->productId);
            $product->cantidad = IngresoProducto::where('productID', $producto->id)->sum('CantidadCJ');
        }
        
        
        return redirect()->route('products.index')->with('success', 'Factura registrada con éxito.');
    }
}
