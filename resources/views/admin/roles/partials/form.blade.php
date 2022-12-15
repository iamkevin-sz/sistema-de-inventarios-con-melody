<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Escriba su nombre']) !!}

    @error('name')
        <small class="text-danger">
            <strong>{{$message}}</strong>
        </small>
    @enderror

</div>

<strong>Permisos</strong>

@foreach ($permissions as $permission )
    <div>
        <label>
            {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
            {{$permission->name}}
        </label>
    </div>
@endforeach

@error('permissions')
    <small class="text-danger">
        <strong>{{$message}}</strong>
    </small>
@enderror
