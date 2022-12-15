<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\DetalleCompras;
use App\Http\Requests\StoreComprasRequest;
use App\Http\Requests\UpdateComprasRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ComprasController extends Controller
{
// public function __construct(){
    //     $this -> middleware('auth');
    // }

    public function index()
    {
        $compras = Compras::get();
        // dd($productos->toArray());
        //  dd($compras);
        return view('admin.compra.index', compact('compras'));
    }


    public function create()
    {
        $proveedores = Proveedor::get();
        $productos = Producto::where('estado', 'ACTIVADO')->get(); // si estado es igual al producto activo, recien mostrara ese producto
        return view('admin.compra.create', compact('proveedores', 'productos'));
    }


    public function store(StoreComprasRequest $request)
    {
    // dd($request->toArray());
    //     dd($request);
        $compra = Compras::create($request->all()+[
            'user_id' =>  Auth::user()->id,
            'fecha_compra' => Carbon::now("America/La_Paz"),]
            );

        foreach ($request ->producto_id as $key => $producto) {

                $resultados[] = array(
                    "producto_id" => $request->producto_id[$key],
                    "cantidad" => $request->cantidad[$key],
                    "precio" => $request->precio[$key]);

        }
        // dd($compra->toArray());
        $compra -> DetalleCompras()->createMany($resultados);
        Alert::success('Exito','Se registro con éxito la compra');

        // dd($compra->toArray());
        return redirect()->route('compras.index');

    }


    public function show(Compras $compra)
    {

        // $compra = Compras::with([
        //     'producto',
        //     'proveedor'
        // ])->get();

        // dd($compra->toArray());
        $subtotal = 0;
        $DetalleCompras = $compra->DetalleCompras;
        foreach($DetalleCompras as $key => $DetalleCompra) {
        $subtotal += $DetalleCompra->cantidad * $DetalleCompra->precio;
        }

        return view('admin.compra.show', compact('compra',"DetalleCompras","subtotal"));

    }


    public function edit(Compra $compra)
    {
        $compras = Compra::get();
        return view('admin.compra.edit', compact('compras'));
    }


    public function update(UpdatePurchaseRequest $request, Purchase $purchase)
    {
        // $purchase->update($request->all());
        // return redirect()->route('purchases.index');
    }


    public function destroy(Purchase $purchase)
    {
        // $purchase->delete();
        // return redirect()->route('purchases.index');
    }

    public function pdf(Compras $compra){

        $subtotal = 0;
        $DetalleCompras = $compra->DetalleCompras;
        foreach($DetalleCompras as $key => $DetalleCompra) {
        $subtotal += $DetalleCompra->cantidad * $DetalleCompra->precio;
        }
        dd($compra->toArray());
        // dd($DetalleCompras->toArray());



        $pdf = PDF::loadView('admin.compra.pdf', compact('compra',"DetalleCompras","subtotal"));

        return $pdf->download('Reporte_de_compra_'.$compra->id.'.pdf');
        // return view('admin.purchase.show', compact('purchase',"purchaseDetails","subtotal"));
    }

    public function subir(Request $reques, Purchase $purchase)
    {
        // $purchase->update($request->all());
        // return redirect()->route('purchases.index');
    }

    public function cambiar_estado(Compras $compra)
    {
        if ($compra->estado == 'VALIDO') {
            $compra ->update(['estado'=>'CANCELADO']);
            return redirect()->back();
            // $purchase->update(['status'=>'CANCELED']);
            // return redirect()->back()->with('toast_success', '¡Estado cambiado con éxito!');
        } else {
            $compra ->update(['estado'=>'VALIDO']);
            return redirect()->back();
            // $purchase->update(['status'=>'VALID']);
            // return redirect()->back()->with('toast_success', '¡Estado cambiado con éxito!');
        }
    }
}
