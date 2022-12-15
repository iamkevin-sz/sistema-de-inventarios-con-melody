<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Producto;
use App\Http\Requests\StoreProveedorRequest;
use App\Http\Requests\UpdateProveedorRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::get();
        return view('admin.proveedor.index', compact('proveedores'));
    }


    public function create()
    {
        return view('admin.proveedor.create');

    }


    public function store(StoreProveedorRequest $request)
    {

        $request -> validate([
            'nombre' => 'required|regex:/^[A-Z,a-z, ,á,é,í,ó,ú]+$/',
            'ciudad' => 'required|regex:/^[A-Z,a-z, ,á,é,í,ó,ú]+$/',
            'correo' => 'required|email',
            'nit' => 'required | numeric | integer',
            'telefono' => 'required | numeric | integer',
        ]);
        // dd($request);
        Proveedor::create($request->all());
        Alert::success('Éxito','se agrego al proveedor '.$request->nombre);
        return redirect()->route('proveedores.index');
        // return $request;

    }


    public function show($id)
    {
        // $producto = producto::all();
        // dd($producto->toArray());

        $proveedor = Proveedor::find($id);
        // dd($proveedor->toArray());
        return view('admin.proveedor.show', compact('proveedor'));

    }


    public function edit($id)
    {
        $proveedor = Proveedor::find($id);
        // dd($proveedor);
        return view('admin.proveedor.edit', compact('proveedor'));
    }


    public function update(UpdateProveedorRequest $request, $id)
    {
        $proveedor = Proveedor::find($id);
        // dd($proveedor->toArray());
        $proveedor->update($request->all());
        return redirect()->route('proveedores.index');
        // return $provider;
    }


    public function destroy($id)
    {
        $proveedor = Proveedor::find($id);
        $proveedor->delete();
        return redirect()->route('proveedores.index');
    }
}
