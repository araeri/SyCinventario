<p>holaaaaa</p>
<table class="table table-responsive table-bordered" id="datatablesSimple">
                    <thead class="thead">
                        <tr>
                            <th>Cod inventario</th>
                            <th>Nombre Inventario</th>
                            <th>Tipo Inventario</th>
                            <th>Foto Inventario</th>
                            <th>Estado Inventario</th>
                            <th>Seleccion Inventario</th>
                            <th>Información Inventario </th>

                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movimientos as $movimiento)
                            <tr>
                                <td>{{ $movimiento->codinventario }}</td>
                                <td>{{ $movimiento->nombreinventario }}</td>
                                <td>{{ $movimiento->tipoinventario}}</td>
                                <td>
                                    <img src="{{asset('/Imagenes/'.$movimiento->fotoinventario)}}" alt="No imagen">
                                </td>
                                <td>{{ $movimiento->estadoinventario}}</td>
                                <td>{{ $movimiento->seleccioninventario}}</td>
                                <td>{{ $movimiento->informacioninventario}}</td>
                                <td>
                                        <a class="btn btn-sm btn-primary " href="{{ route('movimiento.show',$movimiento->idresponsablefk) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>