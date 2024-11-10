<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\ContractsView\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\UpdateClienteRequest;


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


    if (Cliente::where('cuit', $request->cuit)->exists()) {
        return redirect()->route('clientes.create')
            ->withErrors(['cuit' => 'CUIT ya registrado'])
            ->withInput();
    }

    // Crear el cliente
    Cliente::create($request->all());

    return redirect()->route('clientes.index')
        ->with('success', 'Cliente agregado exitosamente');
    }

        public function destroy(Cliente $cliente) : RedirectResponse
    {
        $cliente->delete();
        return redirect()->route('clientes.index')
                ->withSuccess('Cliente eliminado exitosamente.');
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', [
            'cliente' => $cliente
        ]);
    }

    public function update(UpdateClienteRequest $request, Cliente $cliente) : RedirectResponse
    {
        $cliente->update($request->all());
        return redirect()->route('clientes.index')
                ->withSuccess('Cliente editado exitosamente.');
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