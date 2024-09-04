<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\IngresoProducto;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
 
public function index(Request $request) : View
{
    $search = $request->input('search');

    $products = Product::when($search, function ($query, $search) {
        return $query->where('descripcion', 'like', '%' . $search . '%');
    })->latest()->paginate(6);

    return view('products.index', [
        'products' => $products
    ]);
}


    public function create() : View
    {
        return view('products.create');
    }


    public function store(StoreProductRequest $request) : RedirectResponse
    {
        Product::create($request->all());
        return redirect()->route('products.index')
                ->withSuccess('New product is added successfully.');
    }

    public function show(Product $product) : View
    {
        return view('products.show', [
            'product' => $product
        ]);
    }


    public function edit(Product $product) : View
    {
        return view('products.edit', [
            'product' => $product
        ]);
    }


    public function update(UpdateProductRequest $request, Product $product) : RedirectResponse
    {
        $product->update($request->all());
        return redirect()->back()
                ->withSuccess('Product is updated successfully.');
    }


    public function destroy(Product $product) : RedirectResponse
    {
        $product->delete();
        return redirect()->route('products.index')
                ->withSuccess('Product is deleted successfully.');
    }

public function movimientos($id)
{
    $product = Product::with([
        'ingresoProductos.factura.proveedor',
        'envios.sucursal',
        'facturaClienteProductos.facturaCliente.cliente'
    ])->findOrFail($id);

    return view('products.movimientos', [
        'product' => $product,
        'ingresoProductos' => $product->ingresoProductos,
        'envios' => $product->envios,
        'facturaClienteProductos' => $product->facturaClienteProductos
    ]);
}

    public function showSearch(Request $request)    
    {    
        $product=Product::where('descripcion', '=',$request->descripcion)->first();
        if ($product){
            return view('products.movimientos', [
                'product' => $product
            ]);
        }else 
            return redirect()->route('product.viewSearch')
            ->withErrors("Producto no encontrado.");
    }
}