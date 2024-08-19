<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FacturaCliente;
use App\Models\Cliente; 
use App\Models\Product;
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
            'kilosTotal' => 'required|array',
            'precio' => 'required|array'
        ]);

        $factura = FacturaCliente::create([
            'cliente_id' => $request->cliente,
            'numero' => $request->numero,
            'condicion_pago' => $request->condicion_pago,
            'fecha' => $request->fecha,
            'fecha_vencimiento' => $request->fecha_vencimiento,
        ]);

        foreach ($request->product_id as $key => $productId) {
            FacturaClienteProducto::create([
                'factura_cliente_id' => $factura->id,
                'product_id' => $productId,
                'kilos_por_unidad' => $request->kilosPorUnidad[$key],
                'cantidad_cj' => $request->cantidadCJ[$key],
                'kilos_total' => $request->kilosTotal[$key],
                'precio' => $request->precio[$key]
            ]);
        }

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
