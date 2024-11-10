<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProveedorRequest;
use App\Http\Controllers\Request;

class ProveedorController extends Controller
{
    public function index() : View
    {
        return view('proveedors.index', [
            'proveedors' => Proveedor::latest()->paginate(6)
        ]);
    }

    public function create() : View
    {
        return view('proveedors.create');
    }

    public function store(StoreProveedorRequest $request) : RedirectResponse
    {

        
    if (Proveedor::where('CUIT', $request->cuit)->exists()) {
        return redirect()->route('proveedors.create')
            ->withErrors('CUIT ya registrado');
    }

    // Crear el proveedor
    Proveedor::create($request->all());

    return redirect()->route('proveedors.index')
        ->withSuccess('Nuevo Proveedor agregado.');
    }

    public function destroy(Proveedor $proveedor) : RedirectResponse
    {
        $proveedor->delete();
        return redirect()->route('proveedors.index')
            ->withSuccess('Proveedor borrado exitosamente.');
    }


}
