



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
  </head>
  <body>
  <table class="table table-responsive table-bordered" id="datatablesSimple">

<thead class="thead">
    <tr>
        <th>ID movimiento</th>
        <th>Nombre de inventario</th>
        <th>Entrega del movimiento</th>
        <th>Recepcion del movimiento</th>
        <th>Razón Movimiento</th>
        <th>Tipo de movimiento</th>
        <th>Fecha de movimiento</th>
    </tr>
</thead>
<tbody>

@foreach ($query as $movimiento)
<tr>
<td>{{ $movimiento->idmovimiento}}</td>
<td>{{ $movimiento->nombreinventario}}</td>
<td>{{ $movimiento->entregamovimiento}}</td>
<td>{{ $movimiento->recepcionmovimiento }}</td>
<td>{{ $movimiento->razonmovimiento }}</td>
<td>{{ $movimiento->tipomovimiento}}</td>
<td>{{ $movimiento->fechamovimiento}}</td>
</tr>
@endforeach

</tbody>
</table>
  </body>
</html>
