
        <div class="form-group">
            <label for="cliente_id">Cliente</label>
            <select class="form-control" name="cliente_id" id="cliente_id">
             @foreach ($clientes as $cliente)
                 <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
             @endforeach
            </select>
        </div>

        <div class="form-group">
          <label for="impuesto">Impuesto</label>
          <input type="number"
            class="form-control" name="impuesto" id="impuesto" aria-describedby="helpId" placeholder="13%">
        </div>

        <div class="form-group">
            <label for="producto_id">Productos</label>
            <select class="form-control" name="producto_id" id="producto_id">
            <option value="" disabled selected>Seleccione un Producto</option>
             @foreach ($productos as $producto)
                 <option value="{{$producto->id}}_{{$producto->stock}}_{{$producto->precio_venta}}">{{$producto->nombre}}</option>
             @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <input type="text"
              class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId">
          </div>



        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number"
              class="form-control" name="cantidad" id="cantidad" aria-describedby="helpId">
          </div>

          <div class="form-group">
            <label for="precio">Precio de Venta</label>
            <input type="number"
              class="form-control" name="precio" id="precio" aria-describedby="helpId" disabled>
          </div>

          <div class="form-group">
            <label for="descuento">Porcentaje de Descuento</label>
            <input type="number"
              class="form-control" name="descuento" id="descuento" aria-describedby="helpId" value="0">
          </div>

          <div class="form-group">
            <button type="button" id="agregar" class="btn btn-primary float-right">Agregar Producto </button>
          </div>

          <div class="form-group">

                <h4 class="card-title">Detalles de Venta</h4>
                <div class="table-responsive col-md-12">

                    <table id="detalles" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Eliminar</th>
                                <th>Producto</th>
                                <th>Precio de Venta (BS)</th>
                                <th>Descuento</th>
                                <th>Cantidad</th>
                                <th>Subtotal(BS)</th>
                            </tr>
                        </thead>

                        <tfoot>
                            <tr>
                                <th colspan="4">
                                    <p  align = "right">Total:</p>
                                </th>
                                <th>
                                    <p  align = "right"> <span id='total'>BOB 0.00</span></p>
                                </th>
                            </tr>

                            <tr>
                                <th colspan="4">
                                    <p  align = "right">Total Impuesto (13%):</p>
                                </th>
                                <th>
                                    <p  align = "right"> <span id='total_impuesto'>BOB 0.00</span></p>
                                </th>
                            </tr>

                            <tr>
                                <th colspan="4">
                                    <p  align = "right">Total Pagar:</p>
                                </th>
                                <th>
                                    <p  align = "right"> <span align = "right" id='total_pagar_html'>BOB 0.00</span> <input type="hidden" name="total" id="total_pagar"></p>
                                </th>
                            </tr>

                        </tfoot>
                        <tbody>

                        </tbody>

                    </table>
                </div>




