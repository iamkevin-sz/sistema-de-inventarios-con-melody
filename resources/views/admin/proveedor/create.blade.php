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
            Registro de Proveedores
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href={{route('home')}}>Panel administrador</a></li>
                {{-- <li class="breadcrumb-item"><a href="#">Categorías</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">Registro de Proveedores</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => 'proveedores.store', 'method' => 'POST']) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" value="{{old('nombre')}}" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" requerid>

                                    @error('nombre')
                                        <small class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </small>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">

                                <div class="form-group">
                                    <label for="ciudad">Ciudad</label>
                                    <input type="text" value="{{old('ciudad')}}" class="form-control" name="ciudad" id="ciudad" aria-describedby="emailHelpId">

                                    @error('ciudad')
                                        <small class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </small>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">

                                <div class="form-group">
                                    <label for="correo">Correo Electronico</label>
                                    <input type="email" value="{{old('correo')}}"  class="form-control" name="correo" id="correo" aria-describedby="emailHelpId" placeholder="ejemplo@gmail.com" requerid>

                                    @error('correo')
                                        <small class="text-danger">
                                            <strong>{{$message}}</strong>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <div class="form-group">
                                    <label for="nit">Numero de Nit (11)</label>
                                    <input type="number" value="{{old('nit')}}" class="form-control" name="nit" id="nit" aria-describedby="helpId">

                                    @error('nit')
                                    <small class="text-danger">
                                        <strong>{{$message}}</strong>
                                    </small>
                                @enderror
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">

                                <div class="form-group">
                                    <label for="direccion">Direccion</label>
                                    <input type="text" value="{{old('direccion')}}" class="form-control" name="direccion" id="direccion" aria-describedby="emailHelpId"  requerid>
                                </div>
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">

                                <div class="form-group">
                                    <label for="telefono">Numero de Contacto (9)</label>
                                    <input type="number" value="{{old('telefono')}}" class="form-control" name="telefono" id="telefono" aria-describedby="emailHelpId" requerid>

                                    @error('telefono')
                                    <small class="text-danger">
                                        <strong>{{$message}}</strong>
                                    </small>
                                @enderror
                                </div>
                            </div>
                        </div>
                          </div>

                    </div>
                    <div class="d-grid gap-3 d-md-block">
                        <button type="submit" class="btn btn-primary mr-2">Registrar</button>
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
