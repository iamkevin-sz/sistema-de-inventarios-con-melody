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
            Roles
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Roles</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <table id="data-tables" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td width = "10px">
                                        <a class="btn btn-primary" href="{{route('users.edit', $user)}}">Editar</a>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="4">No hay ningun rol registrado</td>
                                </tr>
                            @endforelse


                        <tbody>

                        </tbody>
                    </table>
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
