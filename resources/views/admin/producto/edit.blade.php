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
            Editar  Productos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href={{route('home')}}>Panel administrador</a></li>
                {{-- <li class="breadcrumb-item"><a href="#">Categorías</a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">Editar  Productos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($producto, ['route' => ['productos.update', $producto], 'method' => 'put', 'files' => true, 'enctype'=>'multipart/form-data']) !!}
                    <div class="card-body">

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" id="nombre" value="{{$producto->nombre }}" class="form-control"  aria-describedby="helpId" requerid>

                                    @error('nombre')
                                    <small class="text-danger">
                                    <strong>{{$message}}</strong>
                                    </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label for="precio_venta">Precio de Venta (BS)</label>
                                    <input type="text" name="precio_venta" id="precio_venta" value="{{$producto->precio_venta }}" class="form-control"  aria-describedby="helpId" requerid>

                                    @error('precio_venta')
                                        <small class="text-danger">
                                        <strong>{{$message}}</strong>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                            <div class="row">

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="categoria_id">Categoria</label>
                                        <select class="form-control" name="categoria_id" id="categoria_id" style="width: 100%" required>
                                        @foreach ($categorias as $categoria)
                                            <option value="{{$categoria->id}}"
                                            @if ($categoria->id == $producto->categoria_id)
                                                selected
                                            @endif>
                                            {{$categoria->nombre}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="proveedor_id">Proveedor</label>
                                        <select class="form-control" name="proveedor_id" id="proveedor_id">
                                        @foreach ($proveedores as $proveedor)
                                            <option value="{{$proveedor->id}}"
                                                @if ($proveedor->id == $producto->proveedor_id)
                                                selected
                                                @endif>
                                                {{$proveedor->nombre}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        <div class="col-xs-6 col-sm-6 col-md-6">
                          <div class="mb-3">
                            <label for="imagen" value="{{$producto->imagen }}" class="form-label">Seleccionar Archivo</label><br>
                            <img src="{{asset('archivos/'.$producto ->imagen)}}" height="150" width="150">
                            <input class="form-control" type="file" id="fotografia" name="fotografia">

                            @error('fotografia')
                            <small class="text-danger">
                              <strong>{{$message}}</strong>
                            </small>
                            @enderror
                          </div>
                        </div>

                    </div>
                    <div class="d-grid gap-3 d-md-block">
                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                        <a href="{{route('productos.index')}}" class="btn btn-light mr-2">Cancelar</a>
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
