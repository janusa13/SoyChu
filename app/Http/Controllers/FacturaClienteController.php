<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FacturaCliente;
use App\Models\Cliente; 
use App\Models\Product;
use App\Models\IngresoProducto;
use App\Models\FacturaClienteProducto;
use PDF;

class FacturaClienteController extends Controller
{
    public function create()
    {
        $clientes = Cliente::all();
        $products = Product::all();
        
        return view('facturas.createVenta', compact('clientes', 'products'));
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'cliente' => 'required|exists:clientes,id',
        'numero' => 'required|string',
        'condicion_pago' => 'required|string',
        'fecha' => 'required|date',
        'fecha_vencimiento' => 'required|date',
        'product_id' => 'required|array',
        'kilosPorUnidad' => 'required|array',
        'cantidadCJ' => 'required|array',
        'precio' => 'required|array'
    ]);

    foreach ($request->product_id as $key => $productId) {
        $product = Product::findOrFail($productId);
        $cantidadSolicitada = $request->cantidadCJ[$key];

        if ($product->cantidad < $cantidadSolicitada) {
            return redirect()->back()->withErrors("No hay suficiente stock para el producto: {$product->descripcion}.");
        }
    }

    $factura = FacturaCliente::create([
        'cliente_id' => $request->cliente,
        'numero' => $request->numero,
        'condicion_pago' => $request->condicion_pago,
        'fecha' => $request->fecha,
        'fecha_vencimiento' => $request->fecha_vencimiento,
        'facturaTotal' => 0
    ]);

    $totalFactura = 0;
    foreach ($request->product_id as $key => $productId) {
        $product = Product::findOrFail($productId);
        $cantidadSolicitada = $request->cantidadCJ[$key];

        $product->decrement('cantidad', $cantidadSolicitada);

        $subtotal = $request->precio[$key] * $cantidadSolicitada;
        $totalFactura += $subtotal;


        FacturaClienteProducto::create([
            'factura_cliente_id' => $factura->id,
            'product_id' => $productId,
            'kilos_por_unidad' => $request->kilosPorUnidad[$key],
            'cantidad_cj' => $cantidadSolicitada,
            'kilos_total' => $request->kilosPorUnidad[$key] * $cantidadSolicitada,
            'precio' => $request->precio[$key]
        ]);
    }


    $factura->update(['facturaTotal' => $totalFactura]);

    return redirect()->route('facturaCliente.generatePDF', ['facturaId' => $factura->id]);
}

    public function generatePDF($facturaId)
    {
        $factura = FacturaCliente::with(['facturaClienteProductos.producto'])->findOrFail($facturaId);

        $cliente = $factura->cliente;
        $productos = $factura->facturaClienteProductos;
        $total = $productos->sum(function ($producto) {
            return $producto->precio * $producto->cantidad_cj;
        });

        $pdf = PDF::loadView('pdf.factura', compact('factura', 'cliente', 'productos', 'total'));

        return $pdf->download('factura_cliente_'.$factura->numero.'.pdf');
    }
}
