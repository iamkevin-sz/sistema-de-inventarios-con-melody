@extends('layouts.admin')
@section('title','Registrar categoría')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Registro de Ventas
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href={{route('home')}}>Panel administrador</a></li>
                {{-- <li class="breadcrumb-item"><a href="#">Categorías</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">Registro de Ventas</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'ventas.store', 'method' => 'POST']) !!}
                    <div class="card-body">

                        @include('admin.venta._form')


                    </div>
                    <div class="d-grid gap-3 d-md-block">
                        <button id="guardar" type="submit" class="btn btn-primary float-right">Registrar</button>
                        <a href="{{route('ventas.index')}}" class="btn btn-light ">Cancelar</a>
                    </div><br>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/alerts.js') !!}
{!! Html::script('melody/js/avgrund.js') !!}


{{-- <script src="{{asset('js/app.js')}}"></script> --}}
{{-- <script>
    $(document).ready(function () {
        // alert("hola");
        $('#parent_id').select2();
        $('#icon').select2();
    });
</script> --}}

<script>
    $(document).ready(function() {
    $("#agregar").click(function() {
        agregar();
    })
});

var cont = 1;
total = 0;
subtotal = [];
$("#guardar").hide();
$("#producto_id").change(mostrarValores);

function mostrarValores(){
    datosProducto = document.getElementById('producto_id').value.split('_');
    $("#precio").val(datosProducto[2]);
    $("#stock").val(datosProducto[1]);
}

function agregar() {

    datosProducto = document.getElementById('producto_id').value.split('_');

    producto_id = datosProducto[0];
    producto = $("#producto_id option:selected").text();
    cantidad = $("#cantidad").val();
    descuento = $("#descuento").val();
    precio = $("#precio").val();
    stock = $("#stock").val();
    impuesto = $("#impuesto").val();
    if (producto_id != "" && cantidad != "" && cantidad > 0 && descuento != "" && precio != "") {
        if (parseInt(stock) >= parseInt(cantidad)) {
            subtotal[cont] = (cantidad * precio) - (cantidad * precio * descuento / 100);
            total = total + subtotal[cont];
            var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="producto_id[]" value="' + producto_id + '">' + producto + '</td> <td> <input type="hidden" name="precio[]" value="' + parseFloat(precio).toFixed(2) + '"> <input class="form-control" type="number" value="' + parseFloat(precio).toFixed(2) + '" disabled> </td> <td> <input type="hidden" name="descuento[]" value="' + parseFloat(descuento) + '"> <input class="form-control" type="number" value="' + parseFloat(descuento) + '" disabled> </td> <td> <input type="hidden" name="cantidad[]" value="' + cantidad + '"> <input type="number" value="' + cantidad + '" class="form-control" disabled> </td> <td align="right">BS' + parseFloat(subtotal[cont]).toFixed(2) + '</td></tr>';
            cont++;
            limpiar();
            totales();
            evaluar();
            $('#detalles').append(fila);
        }else {
                swal({
                            title: 'Error!',
                            text: 'La cantidad a vender supera el stock.',
                            button: {
                            text: "OK",
                            value: true,
                            visible: true,
                            className: "btn btn-primary"
                        }
                    })
              }


    } else {

        swal({
                title: 'Error!',
                text: 'Rellene todos los campos del detalle de la venta.',
                button: {
                text: "OK",
                value: true,
                visible: true,
                className: "btn btn-primary"
                }


            })
         }
}

    function limpiar() {
        $("#cantidad").val("");
        $("#descuento").val("0");
        $("#precio").val("");

    }
    function totales() {
        $("#total").html("BOLIVIANO " + total.toFixed(2));

        total_impuesto = total * impuesto / 100;
        total_pagar = total + total_impuesto;
        $("#total_impuesto").html("BO " + total_impuesto.toFixed(2));
        $("#total_pagar_html").html("BO " + total_pagar.toFixed(2));
        $("#total_pagar").val(total_pagar.toFixed(2));
    }
    function evaluar() {
        if (total > 0) {
            $("#guardar").show();
        } else {
            $("#guardar").hide();
        }
    }
    function eliminar(index) {
        total = total - subtotal[index];
        total_impuesto = total * impuesto / 100;
        total_pagar_html = total + total_impuesto;
        $("#total").html("BO" + total);
        $("#total_impuesto").html("BO" + total_impuesto);
        $("#total_pagar_html").html("BO" + total_pagar_html);
        $("#total_pagar").val(total_pagar_html.toFixed(2));
        $("#fila" + index).remove();
        evaluar();
    }

</script>
@endsection
