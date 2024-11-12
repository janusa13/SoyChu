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
                ->withSuccess('Nuevo producto agregado con exito.');
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
                ->withSuccess('Producto editado exitosamente.');
    }


    public function destroy(Product $product) : RedirectResponse
    {
        $product->delete();
        return redirect()->route('products.index')
                ->withSuccess('Producto eliminado exitosamente.');
    }

    public function movimientos(Request $request, $id)
    {
        $fechaDesde = $request->input('fechaDesde');
        $fechaHasta = $request->input('fechaHasta');
    
        $product = Product::with([
            'ingresoProductos.factura.proveedor',
            'envios.sucursal',
            'facturaClienteProductos.facturaCliente.cliente'
        ])->findOrFail($id);
    
        $ingresoProductos = collect(); 
        $envios = collect();           
        $facturaClienteProductos = collect(); 
    
        $totalIngresoCJ = 0;
        $totalEnvioCJ = 0;
        $totalFacturadoCJ = 0;
    
        
        if ($fechaDesde && $fechaHasta) {
            $ingresoProductos = $product->ingresoProductos()
                ->whereHas('factura', function($query) use ($fechaDesde, $fechaHasta) {
                    $query->whereBetween('fecha', [$fechaDesde, $fechaHasta]);
                })->get();
    
            $envios = $product->envios()
                ->whereBetween('enviado_at', [$fechaDesde, $fechaHasta])
                ->get();
    
            $facturaClienteProductos = $product->facturaClienteProductos()
                ->whereHas('facturaCliente', function($query) use ($fechaDesde, $fechaHasta) {
                    $query->whereBetween('fecha', [$fechaDesde, $fechaHasta]);
                })->get();
    
            $totalIngresoCJ = $ingresoProductos->sum('CantidadCJ');
            $totalEnvioCJ = $envios->sum('cantidad');
            $totalFacturadoCJ = $facturaClienteProductos->sum('cantidad_cj');
        }
    
        return view('products.movimientos', [
            'product' => $product,
            'ingresoProductos' => $ingresoProductos,
            'envios' => $envios,
            'facturaClienteProductos' => $facturaClienteProductos,
            'fechaDesde' => $fechaDesde,
            'fechaHasta' => $fechaHasta,
            'totalIngresoCJ' => $totalIngresoCJ,
            'totalEnvioCJ' => $totalEnvioCJ,
            'totalFacturadoCJ' => $totalFacturadoCJ
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