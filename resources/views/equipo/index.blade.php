<p>holaaaaa</p>
<table class="table table-responsive table-bordered" id="datatablesSimple">
                    <thead class="thead">
                        <tr>
                            <th>Id</th>
                            <th>Codequipo</th>
                            <th>Nombre equipo</th>
                            <th>Foto</th>
                            <th>Estado equipo</th>
                            <th>Infomacion equipo</th>

                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipos as $equipo)
                            <tr>
                                <td>{{ $equipo->idinventario}}</td>
                                <td>{{ $equipo->codinventario }}</td>
                                <td>{{ $equipo->nombreinventario }}</td>
                                <td>falta imagen</td>
                                <td>{{ $equipo->estadoinventario}}</td>
                                <td>{{ $equipo->informacioninventario}}</td>

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