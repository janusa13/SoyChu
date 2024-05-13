<?php

namespace App\Http\Controllers;


use App\Models\Sucursal;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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

    
    
}
