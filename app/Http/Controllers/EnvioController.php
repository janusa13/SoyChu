<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\IngresoProducto;
use App\Models\Sucursal;
use App\Models\Envio;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class EnvioController extends Controller
{
    public function index() : View
    {
        $envios = Envio::with('product', 'sucursal')->latest()->paginate(10);
        return view('envios.index', compact('envios'));
    }

    public function create() : View
    {
        $products = Product::all();
        $sucursals = Sucursal::all();
        return view('envios.create', compact('products', 'sucursals'));
    }

public function store(Request $request) : RedirectResponse
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'sucursal_id' => 'required|exists:sucursals,id',
        'cantidad' => 'required|integer|min:1',
        'enviado_at' => 'required|date',
    ]);

    $productId = $request->product_id;
    $cantidadSolicitada = $request->cantidad;

    $cantidadDisponible = DB::table('ingresoproducto')
        ->where('ingresoproducto.productID', $productId)
        ->sum('CantidadCJ')
        - DB::table('factura_cliente_productos')
        ->where('factura_cliente_productos.product_id', $productId)
        ->sum('cantidad_cj');

    if ($cantidadDisponible < $cantidadSolicitada) {
        return redirect()->back()->withErrors('No hay suficiente stock para este producto.');
    }

    


    Envio::create($request->all());

    return redirect()->route('envios.index')->withSuccess('El envío se ha registrado exitosamente.');
}
}
