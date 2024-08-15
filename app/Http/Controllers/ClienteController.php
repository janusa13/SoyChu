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

    public function show(Cliente $cliente)
    {
        return view('clientes.show', [
            'cliente' => $cliente
        ]);
    }

    public function create(){
        return view('clientes.create');
    }

    public function store(Request $request){
        Cliente::create($request->all());
        return redirect()->route('clientes.index')
            ->withSucces('Cliente agregado exitosamente');
    }
}


/*
    Tener el repositorio en Github:
        - Nombre claro
        - Una version a 0.1 (tag de git versionado)
        - Read.me (hacer una descripcion del sistema, dejar registrado versiones de lo que estamos usando (php, laravel, node, mysql, etc.))
        - Inicio de sesion: usuario de administrador (armarlo en el seeder y agregarlo en el README)
        - Breve descripcion de como ejecutar el projecto
        - Migraciones (que anden y que todas las tablas tengan su correspondiente relacion) 
        - Incluir en el repo las especificaciones del sistema.
        */