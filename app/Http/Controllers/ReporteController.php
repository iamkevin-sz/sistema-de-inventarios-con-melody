<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ventas;
use Carbon\Carbon;

class ReporteController extends Controller
{
    function reportes_dia(){

        $ventas = Ventas::whereDate('fecha_venta', Carbon::today('America/La_Paz'))->get();  //carbon today pone la fecha actual y lo que hace es comparar sale date con la fecha actual
        $total = $ventas->sum('total');
        return view('admin.reporte.reportes_dia', compact('ventas', 'total'));

    }

    function reportes_fecha(){
        $ventas = Ventas::whereDate('fecha_venta', Carbon::today('America/La_Paz'))->get();
        $total = $ventas->sum('total');
        return view('admin.reporte.reportes_fecha', compact('ventas', 'total'));
    }

    function reporte_resultado(Request $request){
        $fi = $request->fecha_ini. ' 00:00:00';
        $ff = $request->fecha_fin. ' 23:59:59';
        $ventas = Ventas::whereBetween('fecha_venta', [$fi, $ff])->get();
        $total = $ventas->sum('total');
        return view('admin.reporte.reportes_fecha', compact('ventas', 'total'));
    }
}









