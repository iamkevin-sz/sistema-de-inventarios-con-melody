<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Controllers\admin\DB;
use Illuminate\Support\Facades\DB;
use App\Ventas;
use App\Producto;
use App\Compras;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {

        // $comprasmes = DB::select('SELECT monthname(c.fecha_compra) as mes,
        //  sum(c.total) as totalmes
        //  from compras c where c.estado="VALIDO"
        //  group by monthname(c.fecha_compra)
        //  order by month(c.fecha_compra)
        //  desc limit 12');

        // $comprasmes = DB::table(table: 'ventas')->get();


        // $comprasmes = Compras::where('estado', 'VALIDO')->select(
        //     DB::raw("count(*) as count"),
        //     DB::raw("SUM(total) as totalmes"),
        //     DB::raw("DATE_FORMAT(fecha_compra,'%M %Y') as mes")
        //     )->groupBy('mes')->take(12)->get();

        // dd('compras mes',$comprasmes);

        $comprasmes = DB::select('SELECT monthname(c.fecha_compra) as mes, sum(c.total) as totalmes from compras c where c.estado="VALIDO" group by monthname(c.fecha_compra) desc limit 12');

            // dd('comprasmes',$comprasmes);

        $ventasmes = DB::select('SELECT monthname(v.fecha_venta) as mes, sum(v.total) as totalmes from ventas v where v.estado="VALIDO" group by monthname(v.fecha_venta) desc limit 12');
        // dd('ventasmes',$ventasmes);

        $ventasdia = DB::select('SELECT DATE_FORMAT(v.fecha_venta, "%d/%m/%Y") as dia, sum(v.total) as totaldia from ventas v where v.estado="VALIDO" group by v.fecha_venta order by day(v.fecha_venta) desc limit 15');
        // dd('ventas dia',$ventasdia);

        // $totales = DB::select('SELECT (select ifnull(sum(c.total),0) from compras c where DATE (c.fecha_compra)=curdate() and c.estado= "VALIDO") as totalcompra, (select ifnull(sum(v.total),0) from ventas v where DATE(v.fecha_venta) = curdate() and v.estado = "VALIDO") as totalventa');

        $totales=DB::select('SELECT (select ifnull(sum(c.total),0) from compras c where DATE(MONTH(c.fecha_compra))=MONTH(curdate()) and c.estado="VALIDO") as totalcompra, (select ifnull(sum(v.total),0) from ventas v where DATE(MONTH(v.fecha_venta))=MONTH(curdate()) and v.estado="VALIDO") as totalventa');

        // dd('totales',$totales);


        // $productosvendidos =DB::select('SELECT p.id as id,
        // sum(dv.cantidad) as cantidad, p.nombre as name, p.id as id, p.stock as stock from productos p
        // inner join detalle_ventas dv on p.id=dv.producto_id
        // inner join ventas v on dv.venta_id = v.id where v.estado="VALIDO"
        // and year(v.fecha_venta) = year(curdate())
        // group by p.id , p.nombre, p.id, p.stock order by sum(dv.cantidad) desc limit 10');


        $productosvendidos=DB::select('SELECT p.id as id,
        sum(dv.cantidad) as cantidad, p.nombre as nombre , p.id as id , p.stock as stock from productos p
        inner join detalle_ventas dv on p.id=dv.producto_id
        inner join ventas v on dv.ventas_id=v.id where v.estado="VALIDO"
        and MONTH(v.fecha_venta)=MONTH(curdate())
        group by p.id ,p.nombre, p.id , p.stock order by sum(dv.cantidad) desc limit 10');

        // dd('productosvendidos',$productosvendidos);

        return view('admin.home', compact('comprasmes','ventasmes','ventasdia','totales','productosvendidos'));
    }

}
