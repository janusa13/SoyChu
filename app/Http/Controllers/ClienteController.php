<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\ContractsView\View;
use Illuminate\Http\RedirectResponse;


class ClienteController extends Controller
{
    public function index() 
    {
        return view('clientes.index',[
            'clientes' =>Cliente::latest()->paginate(6)
        ]);
    }

    public function show(Sucursal $sucursal) : View
    {
        return view('clientes.show', [
            'cliente' => $cliente
        ]);
    }
}
