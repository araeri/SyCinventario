<p>holaaaaa</p>
<table class="table table-responsive table-bordered" id="datatablesSimple">
                    <thead class="thead">
                        <tr>
                            <th>Entrega Movimiento</th>
                            <th>Recepcion Movimiento</th>
                            <th>Tipo Movimiento</th>
                            <th>Razón Movimiento</th>
                            <th>Fecha Movimiento</th>

                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movimientos as $movimiento)
                            <tr>
                                <td>{{ $movimiento->entregamovimiento }}</td>
                                <td>{{ $movimiento->recepcionmovimiento }}</td>
                                <td>{{ $movimiento->tipomovimiento}}</td>
                                <td>{{ $movimiento->razonmovimiento}}</td>
                                <td>{{ $movimiento->fechamovimiento}}</td>
                                <td>
                                        <a class="btn btn-sm btn-primary " href="{{ route('movimientolista.show',$movimiento->idmovimiento) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>