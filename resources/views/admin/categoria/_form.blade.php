{{-- <div class="row"> --}}
    {{-- <div class="col-xs-5 col-sm-6 col-md-6"> --}}
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" required>

            @error('nombre')
            <small class="text-danger">
                <strong>{{$message}}</strong>
            </small>
            @enderror
        {{-- </div> --}}
</div>


{{-- <div class="col-xs-5 col-sm-6 col-md-6"> --}}
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control" name="descripcion"  id="descripcion" rows="3"> </textarea>

        @error('descripcion')
        <small class="text-danger">
            <strong>{{$message}}</strong>
        </small>
        @enderror
    {{-- </div> --}}
</div>

{{-- </div> --}}
