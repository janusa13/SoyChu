<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\StoreProveedorRequest;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{

    public function index(Request $request)
    {
    $search = $request->input('search');
    $proveedors = Proveedor::when($search, function ($query, $search) {
        return $query->where('nombre', 'like', '%' . $search . '%');
    })->latest()->paginate(6);
    
    return view('proveedors.index', [
        'proveedors' => $proveedors
    ]);
}
    /*    
    public function index() : View
    {
        return view('proveedors.index', [
            'proveedors' => Proveedor::latest()->paginate(6)
        ]);
    }
    */
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

        public function edit(Proveedor $proveedor) : View
    {
        return view('proveedors.edit', [
            'proveedor' => $proveedor
        ]);
    }

        public function update(Request $request, Proveedor $proveedor) : RedirectResponse
    {
            if (Proveedor::where('cuit', $request->CUIT)->exists()) {
        return redirect()->route('proveedors.edit', $proveedor->id)
            ->withErrors(['CUIT' => 'CUIT ya registrado'])
            ->withInput();
    }
        $proveedor->update($request->all());
        return redirect()->back()
                ->withSuccess('Proveedor actualizada con exito.');
    }


}
