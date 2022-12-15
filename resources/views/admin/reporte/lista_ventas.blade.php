<tr>
    <th scope="row">
        <a href="{{route('ventas.show', $venta)}}">{{$venta->id}}</a>
    </th>
    <td>
        {{\Carbon\Carbon::parse($venta->fecha_venta)->format('d M y h:i a')}}
    </td>
    <td>{{$venta->total}}</td>
    <td>{{$venta->estado}}</td>
    <td style="width: 20%;">
        <a href="{{route('ventas.pdf', $venta)}}" class="btn btn-outline-danger"
        title="Generar PDF"><i class="far fa-file-pdf"></i></a>
        {{-- <a href="{{route('admin.sales.print', $sale)}}" class="btn btn-outline-warning"
        title="Imprimir boleta"><i class="fas fa-print"></i></a> --}}
        <a href="#" class="btn btn-outline-warning"
        title="Imprimir boleta"><i class="fas fa-print"></i></a>
        <a href="{{route('ventas.show', $venta)}}" class="btn btn-outline-info"
        title="Ver detalles"><i class="far fa-eye"></i></a>
    </td>
</tr>
