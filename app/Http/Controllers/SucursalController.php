<?php

namespace App\Http\Controllers;


use App\Models\Sucursal;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function index() : View
    {
        return view('sucursal.indx',[
            'sucursal' =>Sucursal::lastest(3)
        ]);
    }

    
}
