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
            Registro de Compras
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href={{route('home')}}>Panel administrador</a></li>
                {{-- <li class="breadcrumb-item"><a href="#">Categorías</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">Registro de Compras</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'compras.store', 'method' => 'POST']) !!}
                    <div class="card-body">

                        @include('admin.compra._form')


                    </div>
                    <div class="d-grid gap-3 d-md-block">
                        <button id="guardar" type="submit" class="btn btn-primary float-right">Registrar</button>
                        <a href="{{route('compras.index')}}" class="btn btn-light ">Cancelar</a>
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

        var cont = 0;
        total = 0;
        subtotal = [];

        $("#guardar").hide();

        function agregar() {

            producto_id = $("#producto_id").val();
            producto = $("#producto_id option:selected").text();
            cantidad = $("#cantidad").val();
            precio = $("#precio").val();
            impuesto = $("#impuesto").val();

            if(producto_id !="" && cantidad !="" && cantidad>0 && precio !="") {
                // alert()->error('Oops...','Rellene todos los campos!');

                subtotal[cont] = cantidad * precio;
                total = total + subtotal[cont];
                var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-times"></i></button></td><td><input type="hidden" name="producto_id[]" value="'+producto_id+'">'+producto+'</td><td><input type="hidden" id="precio[]" name="precio[]" value="'+precio+'"><input class="form-control" type="number" id="precio[]" value="'+precio+'" disabled></td> <td><input type="hidden" name="cantidad[]" value="'+cantidad+'"><input class="form-control" type="number" value="'+cantidad+'" disabled></td><td align="right">'+subtotal[cont]+'&nbsp;Bs</td></tr>';

                cont++;
                limpiar();
                totales();
                evaluar();
                $('#detalles').append(fila);
                }else{
                    swal({
                            title: 'Error!',
                            text: 'Rellene todos los campos',
                            button: {
                            text: "OK",
                            value: true,
                            visible: true,
                            className: "btn btn-primary"
                            }
                        })
                    // Alert::warning('Error', 'Rellene los campos requeridos');
                }
        }


        function limpiar(){
            $("#cantidad").val("");
            $("#precio").val("");
        }

        function totales(){
            $("#total").html("BOB" + total.toFixed(2));
            total_impuesto = total * impuesto / 100;
            total_pagar = total + total_impuesto;
            $("#total_impuesto").html("BOB" + total_impuesto.toFixed(2));
            $("#total_pagar_html").html("BOB" + total_pagar.toFixed(2));
            $("#total_pagar").val(total_pagar.toFixed(2));
        }

        function evaluar(){

            if(total>0){
                $("#guardar").show();
            }else{
                $("#guardar").hide();
            }

        }

        function eliminar(index) {

            total = total - subtotal[index];
            total_impuesto = total + impuesto/100;
            total_pagar_html = total + total_impuesto;
            $("#total").html("BOB" + total);
            $("#total_impuesto").html("BOB" + total_impuesto);
            $("#total_pagar_html").html("BOB" + total_pagar_html);
            $("#total_pagar").val(total_pagar_html.toFixed(2));
            $("#fila" + index).remove();
            evaluar()
        }

</script>
@endsection
