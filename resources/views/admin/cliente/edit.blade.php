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
            Editar Clientes
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href={{route('home')}}>Panel administrador</a></li>
                {{-- <li class="breadcrumb-item"><a href="#">Categorías</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">Editar Clientes</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($cliente, ['route' => ['clientes.update', $cliente], 'method' => 'put', 'files' => true]) !!}
                    <div class="card-body">

                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text"
                                    class="form-control" value="{{$cliente->nombre}}" name="nombre" id="nombre" aria-describedby="helpId" requerid>
                                    @error('nombre')
                                        <small class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">

                                <div class="form-group">
                                    <label for="ci">CI (8)</label>
                                    <input type="number"
                                        class="form-control" value="{{$cliente->ci}}" name="ci" id="ci" aria-describedby="helpId" requerid>

                                        @error('ci')
                                        <small class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">

                                <div class="form-group">
                                    <label for="direccion">Direccion</label>
                                    <input type="text"
                                        class="form-control" value="{{$cliente->direccion}}" name="direccion" id="direccion" aria-describedby="helpId" >
                                    <small id="helpId" class="form-text text-muted">Este Campo es Opcional</small>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="telefono">Telefono / Celular (9)</label>
                                    <input type="text"
                                        class="form-control" value="{{$cliente->telefono}}" name="telefono" id="telefono" aria-describedby="helpId" >
                                    <small id="helpId" class="form-text text-muted">Este Campo es Opcional</small>

                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="correo">Correo Electronico</label>
                                    <input type="text"
                                        class="form-control" value="{{$cliente->correo}}" name="correo" id="correo" aria-describedby="helpId" >
                                        <small id="helpId" class="form-text text-muted">Este Campo es Opcional</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-3 d-md-block">
                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                        <a href="{{route('clientes.index')}}" class="btn btn-light mr-2">Cancelar</a>
                    </div><br>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script>
    $(document).ready(function () {
        $('#parent_id').select2();
        $('#icon').select2();
    });
</script>
@endsection
