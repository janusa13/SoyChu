<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Request\StoreSucursalRequest;

class SucursalController extends Controller
{
    public function index(Request $request)
    {
    $search = $request->input('search');
    $sucursal = Sucursal::when($search, function ($query, $search) {
        return $query->where('nombre', 'like', '%' . $search . '%');
    })->latest()->paginate(6);
    
    return view('sucursals.index', [
        'sucursals' => $sucursal
    ]);
}
    /*
    public function index() : View
    {
        return view('sucursals.index',[
            'sucursals' => Sucursal::latest()->paginate(6)
        ]);
    }
    */
    public function show(Sucursal $sucursal) : View
    {
        return view('sucursals.show', [
            'sucursal' => $sucursal
        ]);
    }

    public function create() : View 
    {
        return view('sucursals.create');
    }

    public function store(Request $request) : RedirectResponse //AGREGARLE LA VALIDACION DE STORESUCURSALREQUEST
    {
        Sucursal::create($request->all());
        return redirect()->route('sucursal.index')
                ->withSucces('Sucursal agregada exitosamente');
    }

    public function edit(Sucursal $sucursal) : View
    {
        return view('sucursals.edit', [
            'sucursal' => $sucursal
        ]);
    }

    public function update(Request $request, Sucursal $sucursal) : RedirectResponse
    {
        $sucursal->update($request->all());
        return redirect()->back()
                ->withSuccess('Sucursal actualizada con exito.');
    }

        public function destroy(Sucursal $sucursal) : RedirectResponse
    {
        $sucursal->delete();
        return redirect()->route('sucursals.index')
                ->withSuccess('Sucursal borrada exitosamente.');
    }

}
