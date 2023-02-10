<!doctype html>
<html lang="en">

<head>
<a class="navbar-brand ps-3" href="{{ url('/') }}">
            <img src="https://cdn.discordapp.com/attachments/1069978226975309986/1070401530332729434/AIorK4w0dbRTTqbtRkmfUxqrdJxi9KlngoafI1mlnRH3AY0wClHj3CTwQWQyopGqEW9Hu3jFIGCMgOM.png" alt="" height="70">    
        <!-- {{ config('app.name', 'Laravel') }} -->
        </a>
</head>

<body>
<table class="table table-responsive table-bordered" id="datatablesSimple">
                    <thead class="thead">
                        <tr>
                            <th>Fecha de movimiento </th>
                            <th>ID inventario</th>
                            <th>ID responsable</th>
                            <th>Tipo de movimiento</th>
                            <th>Seleccion de inventario</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($movimientos as $movimiento)
                            <tr>
                                <td>{{ $movimiento->fechamovimiento}}</td>
                                <td>{{ $movimiento->idinventariofk }}</td>
                                <td>{{ $movimiento->idresponsablefk}}</td>
                                <td>{{ $movimiento->tipomovimiento}}</td>
                                <td>{{ $movimiento->seleccioninventario}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
</body>

</html>