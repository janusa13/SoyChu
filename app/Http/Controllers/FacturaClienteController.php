<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FacturaCliente;
use App\Models\Cliente; 
use App\Models\Product;
use App\Models\IngresoProducto;
use App\Models\FacturaClienteProducto;
use App\Mail\FacturaClienteMail; // Importa tu mailable
use Illuminate\Support\Facades\Mail; // Importa Mail
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use PDF;

class FacturaClienteController extends Controller
{
    public function create()
    {
        $clientes = Cliente::all();
        $products = Product::all();
        
        return view('facturas.createVenta', compact('clientes', 'products'));
    }

public function index(Request $request) : View
{
    $fechaDesde = $request->input('desde');
    $fechaHasta = $request->input('hasta');

    $facturas = FacturaCliente::with(['cliente', 'facturaClienteProductos.product']) // Cargar las relaciones correctamente
                                ->when($fechaDesde && $fechaHasta, function ($query) use ($fechaDesde, $fechaHasta) {
                                    return $query->whereBetween('fecha', [$fechaDesde, $fechaHasta]);
                                })
                                ->latest()
                                ->paginate(6);
    
    return view('facturas.index', [
        'facturas' => $facturas
    ]);
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

    // Validación de fecha de vencimiento
    if ($request->fecha_vencimiento < $request->fecha) {
        return redirect()->back()->withErrors("La fecha de vencimiento no puede ser menor a la fecha de emisión de la factura");
    }

    // Validar cantidades disponibles para cada producto solicitado
    foreach ($request->product_id as $key => $productId) {
        $cantidadSolicitada = $request->cantidadCJ[$key];

        // Calcular la cantidad disponible usando ingresos y salidas de productos
        $cantidadDisponible = DB::table('ingresoproducto')
            ->where('ingresoproducto.productID', $productId)
            ->sum('CantidadCJ')
            - DB::table('factura_cliente_productos')
            ->where('factura_cliente_productos.product_id', $productId)
            ->sum('cantidad_cj');

        if ($cantidadDisponible < $cantidadSolicitada) {
            return redirect()->back()->withErrors("No hay suficiente stock para el producto ID: {$productId}.");
        }
    }

    // Crear la factura
    $factura = FacturaCliente::create([
        'cliente_id' => $request->cliente,
        'numero' => $request->numero,
        'condicion_pago' => $request->condicion_pago,
        'fecha' => $request->fecha,
        'fecha_vencimiento' => $request->fecha_vencimiento,
        'facturaTotal' => 0
    ]);

    $totalFactura = 0;

    // Guardar productos en la factura y actualizar stock
    foreach ($request->product_id as $key => $productId) {
        $cantidadSolicitada = $request->cantidadCJ[$key];
        
        // Calcular el subtotal para cada producto
        $subtotal = $request->precio[$key] * $cantidadSolicitada;
        $totalFactura += $subtotal;

        // Crear el registro en `factura_cliente_productos`
        FacturaClienteProducto::create([
            'factura_cliente_id' => $factura->id,
            'product_id' => $productId,
            'kilos_por_unidad' => $request->kilosPorUnidad[$key],
            'cantidad_cj' => $cantidadSolicitada,
            'kilos_total' => $request->kilosPorUnidad[$key] * $cantidadSolicitada,
            'precio' => $request->precio[$key]
        ]);
    }

    // Actualizar el total de la factura
    $factura->update(['facturaTotal' => $totalFactura]);

    return redirect()->route('facturaCliente.generatePDF', ['facturaId' => $factura->id]);
}

public function generatePDF($facturaId)
{
    try {
        $factura = FacturaCliente::with(['facturaClienteProductos.product'])->findOrFail($facturaId);

        $cliente = $factura->cliente;
        $productos = $factura->facturaClienteProductos;
        $total = $productos->sum(function ($producto) {
            return $producto->precio * $producto->cantidad_cj;
        });

        $pdf = PDF::loadView('pdf.factura', compact('factura', 'cliente', 'productos', 'total'));

        $pdfPath = storage_path('app/public/temp/' . $factura->numero . '.pdf');

        $pdf->save($pdfPath);

        return response()->download($pdfPath)->deleteFileAfterSend(true);
    } catch (\Exception $e) {
        return back()->with('error', 'Hubo un problema: ' . $e->getMessage());
    }
}
    
public function showSearch(Request $request): View
{
    $fechaDesde = $request->desde;
    $fechaHasta = $request->hasta;

    if ($fechaDesde && $fechaHasta) {
        $facturas = FacturaCliente::whereBetween('fecha', [$fechaDesde, $fechaHasta])->get();
    } else {
        $facturas = FacturaCliente::all();
    }

    return redirect()->route('facturas.index')->withErrors("No hay facturas registradas en esas fechas");
}
}
