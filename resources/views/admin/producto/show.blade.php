@extends('layouts.admin')
@section('title','Gestión de productos')
@section('styles')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.bootstrap4.min.css">
<style>

</style>
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')

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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="border-bottom text-center pb-4">

                                    <h3>{{$producto->nombre}}</h3>
                                            <img src="{{asset('archivos/'.$producto->imagen)}}" alt="profile" class="img-lg rounded-circle mb-3" >
                                    <div class="d-flex justify-content-between" style="text-align: center;">

                                    </div>
                                </div>
                                {{-- <div class="border-bottom py-4">
                                    <div class="list-group">
                                        <button type="button" class="list-group-item list-group-item-action active">
                                            Sobre proveedor
                                        </button>
                                        <button type="button"
                                            class="list-group-item list-group-item-action">Productos</button>

                                        <button type="button" class="list-group-item list-group-item-action">Registrar
                                            producto</button>
                                    </div>
                                </div> --}}

                                <div class="py-4">
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Estado
                                        </span>
                                        <span class="float-right text-muted">
                                            {{$producto->estado}}
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">
                                                Proveedor
                                        </span>
                                        <span class="float-right text-muted">
                                            {{--Productos por categoria--}}

                                            <a href="{{route('proveedores.show', $producto->proveedor)}}">
                                            {{$producto->proveedor->nombre}}
                                            </a>

                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">
                                                Categoría
                                        </span>
                                        <span class="float-right text-muted">
                                            {{-- <a href="{{route('categorias.show', $producto->categoria)}}"> --}}
                                                {{$producto->categoria->nombre}}

                                            </a>
                                        </span>
                                    </p>
                                </div>

                                @if ($producto->estado == 'ACTIVADO')

                                <button class="btn btn-success btn-block">{{$producto->estado}}</button>

                                @else

                                <button class="btn btn-warning btn-block">{{$producto->estado}}</button>

                                @endif
                            </div>


                            <div class="col-lg-8 pl-lg-5">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4>Información del producto</h4>
                                    </div>
                                </div>


                                <div class="profile-feed">
                                    <div class="d-flex align-items-start profile-feed-item">



                                        <div class="form-group col-md-6">
                                            <strong><i class="fab fa-product-hunt mr-1"></i> Código</strong>
                                            <p class="text-muted">
                                                {{$producto->id}}
                                            </p>
                                            <hr>

                                            <strong><i class="fab fa-product-hunt mr-1"></i> Stock</strong>
                                            <p class="text-muted">
                                                {{$producto->stock}}
                                            </p>
                                            <hr>

                                        </div>
                                        <div class="form-group col-md-6">
                                            <strong>
                                                <i class="fas fa-mobile mr-1"></i>
                                                Precio de Venta</strong>
                                            <p class="text-muted">
                                                {{$producto->precio_venta}}&nbsp;Bs
                                            </p>
                                            <hr>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('productos.index')}}" class="btn btn-primary float-right">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>



        {{-- {!! Form::open(['route'=>'productos.store', 'method'=>'POST']) !!}

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
