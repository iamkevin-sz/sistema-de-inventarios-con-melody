<?php

namespace App\Http\Controllers;

use App\Models\Ventas;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\DetalleVentas;
use App\Http\Requests\StoreVentasRequest;
use App\Http\Requests\UpdateVentasRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class VentasController extends Controller
{
    public function index()
    {
        $ventas = Ventas::get();
        // dd($ventas->toArray());
        return view('admin.venta.index', compact('ventas'));
    }


    public function create()
    {
        $productos = Producto::get();
        $clientes = Cliente::get();
        return view('admin.venta.create', compact('clientes', 'productos'));

    }


    public function store(StoreVentasRequest $request)
    {

        $venta = Ventas::create($request->all()+[
            'user_id' =>  Auth::user()->id,
            'fecha_venta' => Carbon::now('America/La_Paz'),
        ]);   //almacena el ide de la venta

        foreach ($request ->producto_id as $key => $producto) {

                $result[] = array(
                "producto_id" => $request->producto_id[$key],
                "cantidad" => $request->cantidad[$key],
                "precio" => $request->precio[$key],
                "descuento" => $request->descuento[$key]);

        }

        $venta -> detalleVentas()->createMany($result);
        Alert::success('Exito','Se registro con éxito la venta');
        return redirect()->route('ventas.index');

    }


    public function show(Ventas $venta)
    {
        // dd($venta->toArray());
        $subtotal = 0;
        $DetalleVentas = $venta->detalleVentas;
        foreach($DetalleVentas as $key => $detalleVenta) {
        $subtotal += $detalleVenta->cantidad * $detalleVenta->precio - (($detalleVenta->cantidad * $detalleVenta->precio)*$detalleVenta->descuento/100);
        }


        return view('admin.venta.show', compact('venta','DetalleVentas','subtotal'));

    }


    public function edit(Sale $sale)
    {
        $providers = Provider::get();
        return view('admin.sale.edit', compact('providers'));
    }


    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        // $sale->update($request->all());
        // return redirect()->route('sales.index');
    }


    public function destroy(Sale $sale)
    {
        // $sale->delete();
        // return redirect()->route('sales.index');
    }

    public function pdf(Ventas $venta){
        // dd($venta->toArray());
        $subtotal = 0;
        $DetalleVentas = $venta->detalleVentas;
        foreach($DetalleVentas as $key => $detalleVentas) {
        $subtotal += $detalleVentas->cantidad * $detalleVentas->precio;
        }
        // dd($DetalleVentas);
        $pdf = PDF::loadView('admin.venta.pdf', compact('venta','subtotal','DetalleVentas'));

        return $pdf->download('Reporte_de_venta_'.$venta->id.'.pdf');
        // return view('admin.purchase.show', compact('purchase',"purchaseDetails","subtotal"));
    }

    public function cambiar_estado(Ventas $venta)
    {

        dd($venta);
        if ($venta->estado == 'VALIDO') {
            $venta ->update(['estado'=>'CANCELADO']);
            return redirect()->back();
            // $purchase->update(['status'=>'CANCELED']);
            // return redirect()->back()->with('toast_success', '¡Estado cambiado con éxito!');
        } else {
            $venta ->update(['estado'=>'VALIDO']);
            return redirect()->back();
            // $purchase->update(['status'=>'VALID']);
            // return redirect()->back()->with('toast_success', '¡Estado cambiado con éxito!');
        }
    }
}
