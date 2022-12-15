<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;


class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::get();
        return view('admin.cliente.index', compact('clientes'));
    }


    public function create()
    {
        return view('admin.cliente.create');

    }


    public function store(StoreClienteRequest $request)
    {

        $request->validate([
            'nombre' => 'required |regex:/^[A-Z,a-z, ,á,é,í,ó,ú]+$/',
            'ci' => 'required | numeric | integer',
        ]);

        // dd($request);
        Cliente::create($request->all());
        Alert::success('Exito','Se registro con éxito al cliente '.$request->nombre);
        return redirect()->route('clientes.index');

    }


    public function show(Cliente $cliente)
    {
        return view('admin.cliente.show', compact('cliente'));

    }


    public function edit(Cliente $cliente)
    {
        return view('admin.cliente.edit', compact('cliente'));
    }


    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $request->validate([
            'nombre' => 'required |regex:/^[A-Z,a-z, ,á,é,í,ó,ú]+$/',
            'ci' => 'required | numeric | integer',
        ]);

        $cliente->update($request->all());
        return redirect()->route('clientes.index');
    }


    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('admin.clients.index');
    }
}
