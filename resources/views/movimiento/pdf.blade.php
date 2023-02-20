<!DOCTYPE html>
<html lang="en">
<style>
table, th, td {
    padding-top: 10px;
    padding-bottom: 20px;
    padding-left: 5px;
    padding-right: 5px;
    border: 1px solid black;
    border-collapse: collapse;

}
</style>
<head>
<img src="https://ci3.googleusercontent.com/mail-sig/AIorK4w0dbRTTqbtRkmfUxqrdJxi9KlngoafI1mlnRH3AY0wClHj3CTwQWQyopGqEW9Hu3jFIGCMgOM" alt="Mountain">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informe de gestion SyC</title>

</head>

<h1 style="text-align:center;">Informe de gestion SyC inventario</h1>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle bg-white table-hover table-borderless" style="width:100%">
                <thead class="bg-light text-secondary">
                    <tr>
                        <!--<th>ID movimiento</th>-->
                        <th>Nombre de inventario</th>
                        <th>Entrega del movimiento</th>
                        <th>Recepcion del movimiento</th>
                        <th style="width:50%">Razón Movimiento</th>
                        <th>Tipo de movimiento</th>
                        <th>Fecha de movimiento</th>
                    </tr>
                </thead>
                <tbody >

                    @foreach ($query as $movimiento)
                    <tr>
                    <!--<td>{{ $movimiento->idmovimiento}}</td>-->
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
        </div>
    </div>
</div>