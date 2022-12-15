<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use RealRashid\SweetAlert\Facades\Alert;

class CategoriaController extends Controller
{

    public function __construct(){
        $this->middleware('can:mostrar categorias')->only('index');
        $this->middleware('can:crear categorias')->only('create', 'store');
        $this->middleware('can:editar categorias')->only('edit', 'update');
        $this->middleware('can:eliminar categorias')->only('destroy');
    }

    public function index()
    {
        $categorias = Categoria::get();
        // dd($categorias);
        return view('admin.categoria.index', compact('categorias'));
    }


    public function create()
    {
        return view('admin.categoria.create');

    }


    public function store(StoreCategoriaRequest $request)
    {
        $request -> validate([
            'nombre' => 'required|regex:/^[A-Z,a-z, ,á,é,í,ó,ú]+$/',
            // 'precio_venta' => 'required | numeric ',
        ]);
        // dd($request);

        Categoria::create($request->all());
        Alert::success('Exito','Creo con exito la '.$request->nombre);
        return redirect()->route('categorias.index');
        // ->with('se-creo', 'La categoria '.$request->nombre.' se creo con exito');
    }


    public function show(Categoria $categoria)
    {
        return view('admin.categoria.show', compact('categoria'));

    }


    public function edit(Categoria $categoria)
    {
        // dd($categoria);
        return view('admin.categoria.edit', compact('categoria'));
    }


    public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    {
        // dd($categoria);
        $request -> validate([
            'nombre' => 'required|regex:/^[A-Z,a-z, ,á,é,í,ó,ú]+$/',
        ]);

        $categoria->update($request->all());
        return redirect()->route('categorias.index')->with('ok', 'La categoria se actualizo con exito');
        // return $categoria;



    }


    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index')->with('info', 'La categoria se elimino con exito');
    }
}
