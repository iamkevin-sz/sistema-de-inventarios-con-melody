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
            Registro de categorías
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-custom">
                <li class="breadcrumb-item"><a href={{route('home')}}>Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="#">Categorías</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de categorías</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($categoria, ['route' => ['categorias.update', $categoria], 'method' => 'put']) !!}

                        <div class="card-body">

                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" value="{{$categoria->nombre}}" class="form-control" id="name" placeholder="Nombre" required>

                                @error('nombre')
                                <small class="text-danger">
                                    <strong>{{$message}}</strong>
                                </small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" name="descripcion"  id="description" rows="3">{{$categoria->descripcion}} </textarea>
                            </div>

                        </div>

                        <div class="d-grid gap-3 d-md-block">
                            <button type="submit" class="btn btn-primary mr-2">Editar Categoria</button>
                            <a href="{{route('categorias.index')}}" class="btn btn-light mr-2">Cancelar</a>
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
