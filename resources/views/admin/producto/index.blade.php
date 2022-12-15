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
            Lista de Productos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Lista de Productos</li>
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
                              <a class="dropdown-item" href="{{route('productos.create')}}">Agregar Productos</a>
                            </div>
                          </div>
                    </div>


                    <div class="table-responsive">
                        <table id="data-tables" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>imagen</th>
                                    <th>Nombre</th>
                                    <th>Stock</th>
                                    <th>Estado</th>
                                    <th>Categoria</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos as $producto )
                                <tr>
                                    <th scope="row"><a href="{{route('productos.show', $producto)}}">{{$producto->id}}</th></a>

                                    <td><img src="{{asset('archivos/'.$producto ->imagen)}}" height="50" width="50"></td>

                                    <td>{{$producto ->nombre}}</td>

                                    {{-- <td>{{$producto ->stock}}</td> --}}


                                    @if ($producto ->stock <= 10)
                                        <td><button class="btn btn-danger">{{$producto ->stock}}</button></td>

                                    @elseif ( $producto ->stock >11 && $producto ->stock <=15)
                                        <td><button class="btn btn-warning">{{$producto ->stock}}</button></td>
                                    @else
                                        <td><button class="btn btn-success">{{$producto ->stock}}</button></td>
                                    @endif



                                    @if ($producto ->estado == 'ACTIVADO')
                                    <td>
                                        <a class="btn btn-success" href="{{route('cambiar.estado.productos', $producto)}}">ACTIVADO &nbsp;<i class="fas fa-check"></i></a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="btn btn-danger" href="{{route('cambiar.estado.productos', $producto)}}">DESACTIVADO &nbsp;<i class="fas fa-times"></i></a>
                                    </td>
                                    @endif
                                    {{-- <td>{{$producto ->estado}}</td> --}}

                                    <td>{{$producto->categoria->nombre}}</td>
                                    {{-- <td>{{$producto->id}}</td> --}}

                                    <td style="width: 50px;">

                                    {!! Form::open(['route' => ['productos.destroy', $producto->id], 'method' => 'DELETE', 'class' => 'formulario_eliminar']) !!}
                                    {{-- {!! Form::open(['route' => ['productos.destroy', $producto->id], 'method' => 'DELETE']) !!} --}}


                                        <a class="jsgrid-button jsgrid-edit-button" href="{{route('productos.edit', $producto->id)}}" title="editar"><i class="far fa-edit"></i></a>

                                        <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar"><i class="far fa-trash-alt"></i></button>

                                        {{-- <a href="{{route('sales.pdf', $sale)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a> --}}
                                        <a href="{{route('productos.show', $producto->id)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>

                                    </td>
                                    {!! Form::close() !!}
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
{!! Html::script('melody/js/alerts.js') !!}
{!! Html::script('melody/js/avgrund.js') !!}

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
    // formulario_eliminar
</script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    $('.formulario_eliminar').submit(function(e){
        e.preventDefault();



        Swal.fire({
        title: 'Estás seguro de Eliminar?',
        text: "No podrás revertir",
        icon: 'Peligro',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar!',
        cancelButtonText: 'Cancelar'
        }).then((result) => {
        if (result.value) {
            // Swal.fire(
            // 'Deleted!',
            // 'Your file has been deleted.',
            // 'success'
            // )
            this.submit();
        }
    })
    });



</script>
@endsection
