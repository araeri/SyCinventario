<!doctype html>
<html lang="en">



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