<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $comprasmes = DB::select('SELECT monthname(c.fecha_compra) as mes, sum(c.total) as tatalmes from compras c where c.estado="VALIDO" group by monthname(c.fecha_compra) order by month(c.fecha_compra) desc limit 12');

        dd($comprasmes);

        $ventasmes = DB::select('SELECT monthname(v.date_sale) as mes, sum(v.total) as tatalmes from sales v where v.estado="VALIDO" group by monthname(v.date_sale) desc limit 12');

        $ventasdia = DB::select('SELECT DATE_FORMAT(v.date_sale, "%d/%m/%Y") as dia, sum(v.total) as tataldia from sales v where v.estado="VALIDO" group by v.date_sale order by day(v.date_sale) desc limit 15');

        $totales = DB::select('SELECT (select infnull(sum(c.total),0) from shoppings c where DATE (c.fecha_compra)=curdate() and c.estado= "VALIDO") as totalcompra, (select ifnull(sum(v.total),0) from sales v where DATE(v.date_sale) = curdate() and v.estado = "VALIDO") as totalventa');

        $productosvendidos =DB::select('SELECT p.code as code, sum(dv.quantity, p.name as name, p.id as id, p.stock as stock from products p
        inner join sale_details dv on p.id=dv.product_id
        inner join sales v on dv.sale_id = v.id where v.estado="VALIDO"
        and year(v.sale_date) = year(curdate())
        group by p.code , p.name, p.id, p.stock order by sum(dv.quantity) desc limit 10');

        return view('home');
    }


}
