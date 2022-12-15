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
            Panel administrador
        </h3>
        {{-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Productos</li>
            </ol>
        </nav> --}}
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-beetween">

                        {{-- <div class="dropdown">
                            <button class="btn btn-primary" type="button" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <br><br>

                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{route('categorias.create')}}">Crear Categoría</a>
                            </div>
                          </div> --}}
                    </div>
                    @foreach ($totales as $total)
                        <div class="row">
                            <div class="col-lg-6 col-xs-6">
                                <div class="card text-white bg-success">
                                    <div class="card-body pb-0">
                                        <div class="float-right">
                                            <i class="fas fa-cart-arrow-down fa-4x"></i>
                                        </div>
                                        <div class="text-value h4">
                                            <strong>BO{{$total->totalcompra}} (MES ACTUAL)</strong>
                                        </div>

                                        <div class="h2">Compras</div>

                                        <div class="Chart-wrapper mt-3 mx-3" style="height: 35px;">
                                            <a href="{{route('compras.index')}}" class="small-box-footer h4">Compras <i class="fa fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-xs-6">
                                <div class="card text-white bg-info">
                                    <div class="card-body pb-0">
                                        <div class="float-right">
                                            <i class="fas fa-shopping-cart fa-4x"></i>
                                        </div>

                                        <div class="text-value h4">
                                            <strong>BO{{$total->totalventa}} (MES ACTUAL)</strong>
                                        </div>

                                        <div class="h2">Ventas</div>
                                    </div>

                                    <div class="Chart-wrapper mt-3 mx-3" style="height: 35px;">
                                        <a href="{{route('ventas.index')}}" class="small-box-footer h4">Ventas <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>



<div class="card-body">

    <div class="d-flex justify-content-beetween">

        {{-- <div class="dropdown">
            <button class="btn btn-primary" type="button" data-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
            </button>
            <br><br>

            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{route('categorias.create')}}">Crear Categoría</a>
            </div>
          </div> --}}
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h4 class="text-center">Compras - Meses</h4>
                </div>
                <div class="card-content">
                    <div class="ct-chart">
                        <canvas id="compras">

                        </canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header">
                    <h4 class="text-center">Ventas - Meses</h4>
                </div>
                <div class="card-content">
                    <div class="ct-chart">
                        <canvas id="ventas">

                        </canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{-- <div class="table-responsive">
        <table id="data-tables" class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria )
                <tr>
                    <th scope="row">{{$categoria->id}}</th>
                    <td>{{$categoria->nombre}}</td>
                    <td>{{$categoria->descripcion}}</td>



                    <td style="width: 50px;">

                    {!! Form::open(['route' => ['categorias.destroy', $categoria], 'method' => 'DELETE']) !!}

                        <a class="jsgrid-button jsgrid-edit-button" href="{{route('categorias.edit', $categoria)}}" title="editar"><i class="far fa-edit"></i></a>

                        <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar"><i class="far fa-trash-alt"></i></button>

                    </td>
                    {!! Form::close() !!}
                </tr>

                @endforeach
            </tbody>
        </table>
    </div> --}}
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-chart">
                <div class="card-header">
                    <h4 class="text-center">Ventas Diarias</h4>
                </div>
                <div class="card-content">
                    <div class="ct-chart">
                        <canvas id="ventas_diarias" height="80">

                        </canvas>
                    </div>
                </div>
            </div>
        </div>
</div>

            <div class="card-body">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="card-heading">
                        <h4 class="card-title">Productos más vendidos</h4>
                    </div>
                </div>

                <div class="card-body scrollbar scroll_dark pt-0" style="max-height:350px">
                    <div class="datatable-wrapper table-responsive">
                        <table class="table table-borderless table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th>Nombre</th>
                                    <th>Código</th>
                                    <th>Stock</th>
                                    <th>Cantidad Vendida</th>
                                    <th>Ver detalles</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($productosvendidos as $productovendido)
                                    <tr>
                                        <td>{{$productovendido -> id}}</td>
                                        <td>{{$productovendido -> nombre}}</td>
                                        <td>{{$productovendido -> id}}</td>
                                        <td><strong>{{$productovendido -> stock}}</strong> Stock</td>
                                        <td><strong>{{$productovendido -> cantidad}}</strong> Unidades</td>
                                        <td><a href="{{route('productos.show', $productovendido -> id)}}">
                                            <i class="far fa-eye">
                                                Ver Detalles
                                            </i>
                                        </a></td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>



        </div>
    </div>
</div>

<



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
{!! Html::script('melody/js/chart.js') !!}


<script>
    $(function(){
        var varCompra=document.getElementById('compras').getContext('2d');

            var charCompra = new Chart(varCompra, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($comprasmes as $reg)
                        {

                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                    $mes_traducido=strftime('%B',strtotime($reg->mes));

                    echo '"'. $mes_traducido.'",';} ?>],
                    datasets: [{
                        label: 'Compras',
                        data: [<?php foreach ($comprasmes as $reg)
                            {echo ''. $reg->totalmes.',';} ?>],

                        backgroundColor: '#E91E63',
                        borderColor: '#E91E63',

                        borderWidth:3
                    }]
                },

                options: {
                    scales: {
                      yAxes: [{
                        ticks: {

                            beginAtZero:true
                        }
                      }]
                    },
                    legend: {
                      display: false
                    },
                    elements: {
                      point: {
                        radius: 5
                      }
                    }
                }
            });

            var varVenta=document.getElementById('ventas').getContext('2d');
            var charVenta = new Chart(varVenta, {
                type: 'bar',
                data: {
                    labels: [<?php foreach ($ventasmes as $reg)
                {
                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                    $mes_traducido=strftime('%B',strtotime($reg->mes));

                    echo '"'. $mes_traducido.'",';} ?>],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventasmes as $reg)
                        {echo ''. $reg->totalmes.',';} ?>],
                        backgroundColor: '#f96868',
                        borderColor: '#f96868',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                      yAxes: [{
                        ticks: {

                            beginAtZero:true
                        }
                      }]
                    },
                    legend: {
                      display: false
                    },
                    elements: {
                      point: {
                        radius: 5
                      }
                    }
                }
            });



            var varVenta=document.getElementById('ventas_diarias').getContext('2d');
            var charVenta = new Chart(varVenta, {
                type: 'line',
                data: {
                    labels: [<?php foreach ($ventasdia as $ventadia)
                {
                    $dia = $ventadia->dia;

                    echo '"'. $dia.'",';} ?>],
                    datasets: [{
                        label: 'Ventas',
                        data: [<?php foreach ($ventasdia as $reg)
                        {echo ''. $reg->totaldia.',';} ?>],
                        backgroundColor: '#f96868',
                        borderColor: '#000000',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                      yAxes: [{
                        ticks: {

                            beginAtZero:true
                        }
                      }]
                    },
                    legend: {
                      display: false
                    },
                    elements: {
                      point: {
                        radius: 5
                      }
                    }
                }
            });
    });
</script>
@endsection
