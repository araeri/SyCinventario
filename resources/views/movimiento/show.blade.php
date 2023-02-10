<td>{{$responsables->idresponsable}}</td>
<td>{{$responsables->razonresponsable}}</td>
@foreach ($movimientos as $movimiento)
    <tr>
        <td>{{ $movimiento->idinventariofk}}</td>
        <td>{{ $movimiento->idresponsablefk }}</td>
        <td>{{ $movimiento->tipomovimiento }}</td>
        <td>{{ $movimiento->fechamovimiento }}</td>
        <td>{{ $movimiento->estadoinventario}}</td>
        <td>{{ $movimiento->cantidadmovimiento}}</td>
        <td>{{ $movimiento->informacioninventario}}</td>
    </tr>
@endforeach