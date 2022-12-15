<?php

namespace App\Http\Controllers;

use App\Models\Cotizaciones;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\DetalleCotizaciones;
use App\Http\Requests\StoreCotizacionesRequest;
use App\Http\Requests\UpdateCotizacionesRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class CotizacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotizaciones = Cotizaciones::get();
        // dd($ventas->toArray());
        return view('admin.cotizaciones.index', compact('cotizaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::get();
        $clientes = Cliente::get();
        return view('admin.cotizaciones.create', compact('clientes', 'productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCotizacionesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCotizacionesRequest $request)
    {
        // $cotizacion = [
        //     'user_id' =>  Auth::user()->id,];

        // dd($request);

        $cotizacion = Cotizaciones::create($request->all()+[
            'user_id' =>  Auth::user()->id,
            'fecha_cotizacion' => Carbon::now('America/La_Paz'),
        ]);



        foreach ($request->producto_id as $key => $producto) {

                $result[] = array(
                "producto_id" => $request->producto_id[$key],
                "cantidad" => $request->cantidad[$key],
                "precio" => $request->precio[$key],
                "descuento" => $request->descuento[$key]
                );

        }

        $cotizacion -> detalleCotizaciones()->createMany($result);

        return redirect()->route('cotizaciones.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cotizaciones  $cotizaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Cotizaciones $cotizaciones)
    {
        $subtotal = 0;
        $DetalleCotizaciones = $cotizaciones->detalleCotizaciones;
        foreach($DetalleCotizaciones as $key => $DetalleCotizacion) {
        $subtotal += $DetalleCotizacion->cantidad * $DetalleCotizacion->precio - (($DetalleCotizacion->cantidad * $DetalleCotizacion->precio)*$DetalleCotizacion->descuento/100);
        }


        return view('admin.cotizaciones.show', compact('cotizaciones','DetalleCotizaciones','subtotal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cotizaciones  $cotizaciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Cotizaciones $cotizaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCotizacionesRequest  $request
     * @param  \App\Models\Cotizaciones  $cotizaciones
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCotizacionesRequest $request, Cotizaciones $cotizaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cotizaciones  $cotizaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cotizaciones $cotizaciones)
    {
        //
    }

    public function pdf(Cotizaciones $cotizaciones){
        // dd($cotizaciones->toArray());
        $subtotal = 0;
        $DetalleCotizaciones = $cotizaciones->detalleCotizaciones;
        foreach($DetalleCotizaciones as $key => $DetalleCotizacion) {
        $subtotal += $DetalleCotizacion->cantidad * $DetalleCotizacion->precio;
        }
        // dd($DetalleVentas);
        $pdf = PDF::loadView('admin.cotizaciones.pdf', compact('cotizaciones','subtotal','DetalleCotizaciones'));

        return $pdf->download('Reporte_cotizacion_'.$cotizaciones->id.'.pdf');
        // return view('admin.purchase.show', compact('purchase',"purchaseDetails","subtotal"));
    }

    public function cambiar_estado(Cotizaciones $cotizaciones)
    {
        dd($cotizaciones);
        if ($cotizaciones->estado == 'ENTREGADO') {
            $cotizaciones ->update(['estado'=>'PENDIENTE']);
            return redirect()->back();
            // $purchase->update(['status'=>'CANCELED']);
            // return redirect()->back()->with('toast_success', '¡Estado cambiado con éxito!');
        } else {
            $cotizaciones ->update(['estado'=>'ENTREGADO']);
            return redirect()->back();
            // $purchase->update(['status'=>'VALID']);
            // return redirect()->back()->with('toast_success', '¡Estado cambiado con éxito!');
        }
    }
}
