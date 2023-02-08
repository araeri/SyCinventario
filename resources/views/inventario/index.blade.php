<p>holaaaaa</p>
<table class="table table-responsive table-bordered" id="datatablesSimple">
                    <thead class="thead">
                        <tr>
                            <th>Id</th>
                            <th>CodInventario</th>
                            <th>Nombre Inventario</th>
                            <th>Tipo Inventario</th>
                            <th>Foto</th>
                            <th>Estado Inventario</th>
                            <th>Infomacion Inventario</th>

                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventarios as $inventario)
                            <tr>
                                <td>{{ $inventario->idinventario }}</td>
                                <td>{{ $inventario->codinventario }}</td>
                                <td>{{ $inventario->nombreinventario }}</td>
                                <td>{{ $inventario->tipoinventario}}</td>
                                <td>falta imagen</title></td>
                                <td>{{ $inventario->estadoinventario}}</td>
                                <td>{{ $inventario->informacioninventario}}</td>

                                <td>
                                    <form action="#" method="POST">
                                        <a class="btn btn-sm btn-primary " href="#"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                        <a class="btn btn-sm btn-success" href="#"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>