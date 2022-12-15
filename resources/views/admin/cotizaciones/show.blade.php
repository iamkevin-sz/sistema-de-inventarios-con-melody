@extends('layouts.admin')
@section('title','Gestión de productos')
@section('styles')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap4.min.css">
<style>
    .unstyled-button{
        border: none;
        padding: 0;
        background:none;
    }
</style>
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')

@if (session('info'))

    <div class="alert alert-primary" role="alert">
        <strong>!Exito</strong> {{session('info')}}
    </div>

@endif

@if (session('ok'))

    <div class="alert alert-success" role="alert">
        <strong>!Exito</strong> {{session('ok')}}
    </div>

@endif

@if (session('se-creo'))

    <div class="alert btn btn-primary" role="alert">
        <strong>!Exito</strong> {{session('se-creo')}}
    </div>

@endif


<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Detalle Cotizaciones
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalle Cotizaciones</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-4 text-center">
                            <label class="form-control-label"><strong>Cliente</strong></label>
                            {{-- <p><a href="{{route('clientes.show', $cotizaciones->cliente)}}">{{$cotizaciones->cliente->nombre}}</a></p> --}}
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="form-control-label"><strong>Vendedor</strong></label>
                            <p>
                                {{-- <a href="{{route('admin.users.show',$ventas->user)}}"> --}}
                                {{-- {{$cotizaciones->user->name}} --}}
                            </p>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="form-control-label"><strong>Número Venta</strong></label>
                            <p>{{$cotizaciones->id}}</p>
                        </div>
                    </div>
                    <br /><br />
                    <div class="form-group">
                        <h4 class="card-title"><strong>Detalles de venta</strong></h4><br><br>
                        <div class="table-responsive col-md-12">
                            <table id="detalleVentass" class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio Venta (BO)</th>
                                        <th>Descuento(BO)</th>
                                        <th>Cantidad</th>
                                        <th>SubTotal(BO)</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($DetalleCotizaciones as $DetalleCotizacion)
                                    <tr>
                                        <td>{{$DetalleCotizacion->producto->nombre}}</td>
                                        <td>{{$DetalleCotizacion->precio}}&nbsp;Bs</td>
                                        <td>{{$DetalleCotizacion->descuento}} %</td>
                                        <td>{{$DetalleCotizacion->cantidad}}</td>
                                        <td>{{number_format($DetalleCotizacion->cantidad*$DetalleCotizacion->precio - $DetalleCotizacion->cantidad*$DetalleCotizacion->precio*$DetalleCotizacion->descuento/100,2)}}&nbsp;Bs
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                                <tfoot>

                                    <tr>
                                        <th colspan="4">
                                            <p align="right">SUBTOTAL:</p>
                                        </th>
                                        <th>
                                            <p align="right">{{number_format($subtotal,2)}}&nbsp;Bs</p>
                                        </th>
                                    </tr>

                                    <tr>
                                        <th colspan="4">
                                            <p align="right">TOTAL IMPUESTO ({{$cotizaciones->impuesto}}%):</p>
                                        </th>
                                        <th>
                                            <p align="right">{{number_format($subtotal*$cotizaciones->impuesto/100,2)}}&nbsp;Bs</p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">
                                            <p align="right">TOTAL:</p>
                                        </th>
                                        <th>
                                            <p align="right">{{number_format($cotizaciones->total,2)}}&nbsp;Bs</p>
                                        </th>
                                    </tr>

                                </tfoot>

                            </table>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>


        {{-- {!! Form::open(['route'=>'products.store', 'method'=>'POST']) !!}

        <div class="modal-body">
          <div class="form-group">
            <label for="name">Nombre de producto</label>
            <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Continuar</button>
          <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
        </div>

        {!! Form::close() !!} --}}

      </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.bootstrap4.min.js"></script>
{!! Html::script('js/my_functions.js') !!}

<script>
 $('#data-tables').DataTable({
        "language": {
            "search":       "Buscar",
            "lengthMenu":   "Mostrar _MENU_ registros por página",
            "info":         "Mostrando página _PAGE_ de _PAGES_",
            "zeroRecords": 'No se encontró lo que buscas',
            "infoEmpty": '0 resultados',
            "infoFiltered": '(Filtrado de _MAX_ registros totales)',
            "paginate": {

                            "previous": "Anterior",
                            "next": "Siguiente",
                            "first": "Primero",
                            "last": "Último"
            }
        }
    });
</script>
@endsection
