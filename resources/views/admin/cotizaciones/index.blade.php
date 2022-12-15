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
            Lista de Cotizaciones
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Lista de Cotizaciones</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-beetween">

                        <div class="dropdown">
                            <button class="btn btn-primary" type="button" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <br><br>

                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="{{route('cotizaciones.create')}}">Agregar Cotización</a>
                            </div>
                          </div>
                    </div>


                    <div class="table-responsive">
                        <table id="data-tables" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Fecha</th>
                                    {{-- <th>Cliente</th>
                                    <th>Vendedor</th> --}}
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cotizaciones as $cotizacion )
                                <tr>
                                    <th scope="row"><a href="{{route('cotizaciones.show', $cotizacion)}}">{{$cotizacion->id}}</th></a>
                                    <td>{{$cotizacion ->fecha_cotizacion}}</td>
                                    <td>{{$cotizacion ->total}}</td>
                                    @if ($cotizacion->estado == 'ENTREGADO')
                                     <td>
                                        <a class="btn btn-success" href="{{route('cambiar.estado.cotizaciones', $cotizacion)}}">Entregado &nbsp;<i class="fas fa-check"></i></a>
                                     </td>
                                     @else
                                <td>
                                    <a class="btn btn-danger " href="{{route('cambiar.estado.cotizaciones', $cotizacion)}}">Pendiente &nbsp;<i class="fas fa-times"></i></a>
                                </td>
                                @endif


                                <td style="width: 20%;">
                                    <a href="{{route('cotizaciones.pdf', $cotizacion)}}" class="btn btn-secondary" ><i class="fa fa-file-pdf"></i></a>
                                    <a href="#" class="btn btn-primary "><i class="fa fa-print"></i></a>
                                    <a href="{{route('cotizaciones.show', $cotizacion)}}" class="btn btn-warning" style="color:white"><i class="fa fa-eye"></i></a>
                                </td>


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
