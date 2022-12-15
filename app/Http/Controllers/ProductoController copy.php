<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;
// use App\Models\DetalleCompras;
// use App\Models\DetalleVentas;
use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ProductoController extends Controller
{
    public function index()
{
        // $productos = Producto::get();

        $productos = Producto::with([
            'categoria',
            'proveedor'
            // 'detalleCompras',
            // 'detalleVentas'
        ])->get();

        // $stock = Producto::get();
        // $productos = Categoria::with([

        //     'productos:id, categoria_id, nombre',

        // ])->findOrFail(2);

        // dd($productos->toArray());
        // dd( $stock->toArray());

        return view('admin.producto.index', compact('productos'));

    }



    public function create()
    {
        $categorias = Categoria::get();
        $proveedores = Proveedor::get();
        return view('admin.producto.create', compact('categorias', 'proveedores'));

    }


    public function store(StoreProductoRequest $request)
    {
        $request -> validate([
            'nombre' => 'required|regex:/^[A-Z,a-z, ,á,é,í,ó,ú]+$/',
            'precio_venta' => 'required | numeric ',
            'fotografia' => 'image | mimes:gif,jpeg,jpg,png,webp',
        ]);
        // dd($request->toArray());

        // if($request -> hasFile('fotografia')){
            // $archivo = $request -> file('fotografia');
            // $nombre_imagen = time().' _ '. $archivo -> getClientOriginalName();
            // $archivo -> move(public_path("/image"), $nombre_imagen);
            $file = $request->file('fotografia');
            if($file <> ""){
            $img = $file->getClientOriginalName();
            $img2 = $request->id.'_'.$img;
            \Storage::disk('local')->put($img2, \File::get($file));
            }else{
                $img2 = "sinfoto.jpeg";
            }
            $producto = Producto::create($request->all()+[
                'imagen' => $img2,
            ]);

            // Alert::success('Exito','Creo con exito la categoria '.$request->nombre);
        // }else{
            // Alert::warning('Error', 'Rellene los campos requeridos');
            return redirect()->route('productos.create');
        // }
        // dd($request->toArray());




        // Alert::success('register','bienbenido');

        // $producto -> update(['code'=>$producto->id]);

        return redirect()->route('productos.index');

    }


    public function show(Producto $producto)
    {
        return view('admin.producto.show', compact('producto'));

    }


    public function edit(Producto $producto)
    {
        // dd($producto->toArray());
        $categorias = Categoria::get();
        $proveedores = Proveedor::get();

        $producto->kevin = (object)[
            'producto' => $producto,
            'categorias' => $categorias,
        ];
        // dd($producto->toArray());

        // dd($proveedores->toArray());
        return view('admin.producto.edit', compact('producto','categorias', 'proveedores'));
    }


    public function update(UpdateProductoRequest $request, Producto $producto)
    {
        $request -> validate([
            'nombre' => 'required|regex:/^[A-Z,a-z, ,á,é,í,ó,ú]+$/',
            'precio_venta' => 'required | numeric ',
            'fotografia' => 'image | mimes:gif,jpeg,jpg,png,webp',
        ]);

        // if($request -> hasFile('fotografia')){
        //     $archivo = $request -> file('fotografia');
        //     $nombre_imagen = time().' _ '. $archivo -> getClientOriginalName();
        //     $archivo -> move(public_path("/image"), $nombre_imagen);
        // }

        // $producto->update($request->all()+[
        //     'imagen' => $nombre_imagen,
        // ]);

        $file = $request->file('fotografia');
            if($file <> ""){
            $img = $file->getClientOriginalName();
            $img2 = $request->id.'_'.$img;
            \Storage::disk('local')->put($img2, \File::get($file));

            $producto->update($request->all()+[
                'imagen' => $img2,
            ]);

            }else{
                $producto->update($request->all());
            };




        return redirect()->route('productos.index');
    }


    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index');
    }

    public function cambiar_estado(Producto $producto)
    {
        if ($producto->estado == 'ACTIVADO') {
            $producto ->update(['estado'=>'DESACTIVADO']);
            return redirect()->back();
            // $purchase->update(['status'=>'CANCELED']);
            // return redirect()->back()->with('toast_success', '¡Estado cambiado con éxito!');
        } else {
            $producto ->update(['estado'=>'ACTIVADO']);
            return redirect()->back();
            // $purchase->update(['status'=>'VALID']);
            // return redirect()->back()->with('toast_success', '¡Estado cambiado con éxito!');
        }
    }
}
