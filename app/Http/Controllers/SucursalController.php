<?php

namespace App\Http\Controllers;


use App\Models\Sucursal;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Request\StoreSucursalRequest;

class SucursalController extends Controller
{
    public function index() : View
    {
        return view('sucursals.index',[
            'sucursals' => Sucursal::latest()->paginate(6)
        ]);
    }

    public function create() : View
    {
        return view('sucursals.create');
    }

    public function store(StoreSucursalRequest $request) : RedirectResponse
    {
        Sucursal::create($request->all());
        return redirect()->route('sucursal.index')
                ->withSucces('Sucursal agregada exitosamente');

    }


    
}
