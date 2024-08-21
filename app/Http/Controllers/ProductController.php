<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\IngresoProducto;

use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
 
    public function index() : View
    {
        
        $products = Product::latest()->paginate(6);

        
        foreach ($products as $product) {
           
            $product->totalKilos = IngresoProducto::where('productID', $product->id)->sum('Kilos');
        }

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
}