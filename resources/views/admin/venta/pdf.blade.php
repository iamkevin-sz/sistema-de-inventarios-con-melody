<!DOCTYPE>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Reporte de venta</title>
<style>
    body {
        /*position: relative;*/
        /*width: 16cm;  */
        /*height: 29.7cm; */
        /*margin: 0 auto; */
        /*color: #555555;*/
        /*background: #FFFFFF; */
        font-family: Arial, sans-serif;
        font-size: 14px;
        /*font-family: SourceSansPro;*/
    }


    #datos {
        float: left;
        margin-top: 0%;
        margin-left: 2%;
        margin-right: 2%;
        /*text-align: justify;*/
    }

    #encabezado {
        text-align: center;
        margin-left: 35%;
        margin-right: 35%;
        font-size: 15px;
    }

    #fact {
        /*position: relative;*/
        float: right;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
        font-size: 12px;
        /* background: #D2691E; */
        font-weight: bold;
    }

    section {
        clear: left;
    }

    #cliente {
        text-align: left;
    }

    #facliente {
        width: 40%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #fac,
    #fv,
    #fa {
        color: #FFFFFF;
        font-size: 15px;
    }

    #facliente thead {
        padding: 20px;
        background: #D2691E;
        text-align: left;
        border-bottom: 1px solid #FFFFFF;
    }

    #facvendedor {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #facvendedor thead {
        padding: 20px;
        background: #D2691E;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }

    #facproducto {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #facproducto thead {
        padding: 20px;
        background: #D2691E;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
        /* text-align: right; */
    }

</style>

<body>
    <header>
        {{--  <div id="logo">
            <img src="{{asset($company->logo)}}" alt="" id="imagen">
        </div>  --}}
        <div>
            <H1 align="center">RECIBO DE VENTA</H1>
            <table id="datos">
                <thead>
                    <tr>
                        <th id="">DATOS DEL VENDEDOR</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <p id="proveedor" align="left">



                                NOMBRE: {{$venta->user->name}}<br>

                                EMAIL: {{$venta->user->email}}
                            </p>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
        {{-- <div id="fact"> --}}
        <div id="fact">
            <p>
                NRO DE RECIBO: ADP - 000{{$venta->id}} <br>

               FECHA: {{$venta -> fecha_venta}}<br>
           </p>
             {{-- <p>
                {{$sale->user->types_identification}}-VENTA
                <br>
                {{$sale->user->id}}
            </p>
            <p>
                 NÚMERO DE VENTA {{$sale->id}}
                NRO DE RECIBO: ES-{{$sale->id}} <br>

                FECHA: {{$sale -> sale_date}}<br>
            </p> --}}
        </div>
    </header>
    <br>
    <br>
    <section>
        <div>
            <table id="facproducto">
                <thead>
                    <tr id="fa">
                        <th>CANTIDAD</th>
                        <th>PRODUCTO</th>
                        <th>PRECIO VENTA(BS)</th>
                        <th>DESCUENTO(%)</th>
                        <th>SUBTOTAL(BS)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($DetalleVentas as $detalleVentas)
                    <tr>
                        <td>{{$detalleVentas->cantidad}}</td>
                        <td>{{$detalleVentas->producto->nombre}}</td>
                        <td>{{$detalleVentas->precio}}&nbsp;Bs</td>
                        <td>{{$detalleVentas->descuento}}</td>
                        <td>{{number_format($detalleVentas->cantidad*$detalleVentas->precio - $detalleVentas->cantidad*$detalleVentas->price*$detalleVentas->descuento/100,2)}}&nbsp;Bs
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>

                    <tr>
                        <th colspan="4">
                            <p align="right">SUBTOTAL:</p>
                        </th>
                        <td>
                            <p align="right">{{number_format($subtotal,2)}}&nbsp;Bs</p>
                        </td>
                    </tr>

                    <tr>
                        <th colspan="4">
                            <p align="right">TOTAL IMPUESTO ({{$venta->impuesto}}%):</p>
                        </th>
                        <td>
                            <p align="right">{{number_format($subtotal*$venta->impuesto/100,2)}}&nbsp;Bs</p>
                        </td>
                    </tr>

                    <tr>
                        <th colspan="4">
                            <p align="right">TOTAL PAGAR:</p>
                        </th>
                        <td>
                            <p align="right">{{number_format($venta->total,2)}}&nbsp;Bs</p>
                        </td>
                    </tr>


                </tfoot>
            </table>
        </div>
    </section>
    <br>
    <br>
    <footer>
        <!--puedes poner un mensaje aqui-->
        <div id="datos">
            <p id="encabezado">
                {{--  <b>{{$company->name}}</b><br>{{$company->description}}<br>Telefono:{{$company->telephone}}<br>Email:{{$company->email}}  --}}
            </p>
        </div>
    </footer>
</body>

</html>
