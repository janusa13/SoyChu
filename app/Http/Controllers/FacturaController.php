<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Factura;
use App\Models\Proveedor;
use App\Models\IngresoProducto;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FacturaController extends Controller
{
    public function create() : View
    {
        $products = Product::all();
        $proveedors = Proveedor::all();
        return view('facturas.create', compact('products', 'proveedors'));
    }

    public function store(Request $request) : RedirectResponse
    {
 
        $factura = new Factura();
        $factura->proveedor_id = $request->proveedor;
        $factura->numero = $request->numero;
        $factura->condicion_pago = $request->condicion_pago;
        $factura->fecha = $request->fecha;
        $factura->fecha_vencimiento = $request->fecha_vencimiento;
        $factura->save();
                    if ($request->fecha_vencimiento < $request->fecha) {
            return redirect()->back()->withErrors("La fecha de vencimiento no puede ser menor a la fecha de emicion de la factura");
        }
        for ($i = 0; $i < count($request->product_id); $i++) {
            $productoIngreso = new IngresoProducto();
            $productoIngreso->facturaID = $factura->id;
            $productoIngreso->productID = $request->product_id[$i];
            $productoIngreso->kilosPorUnidad = $request->kilosPorUnidad[$i];
            $productoIngreso->cantidadCJ = $request->cantidadCJ[$i];
            $productoIngreso->kilos = $request->kilosPorUnidad[$i] *  $request->cantidadCJ[$i] ;
            $productoIngreso->precio = $request->precio[$i];
            $productoIngreso->save();
            $product = Product::findOrFail($request->product_id[$i]);

        }

        return redirect()->route('products.index')->with('success', 'Factura registrada con éxito.');
    }

}
