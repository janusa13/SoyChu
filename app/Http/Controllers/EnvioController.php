<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sucursal;
use App\Models\Envio;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

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

        $product = Product::findOrFail($request->product_id);

        if ($product->cantidad < $request->cantidad) {
            return redirect()->back()->withErrors('No hay suficiente stock para este producto.');
        }

        $product->decrement('cantidad', $request->cantidad);

        Envio::create($request->all());

        return redirect()->route('envios.index')->withSuccess('El envío se ha registrado exitosamente.');
    }
}
