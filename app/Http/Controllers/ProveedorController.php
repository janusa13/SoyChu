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
