<p>holaaaaa</p>
<table class="table table-responsive table-bordered" id="datatablesSimple">
                    <thead class="thead">
                        <tr>
                            <th>Id</th>
                            <th>Cod vehiculo</th>
                            <th>Nombre vehiculo</th>
                            <th>Patente vehivulo</th>
                            <th>tipo vehiculo</th>
                            <th>Foto</th>
                            <th>Estado vehiculo</th>
                            <th>Infomacion vehiculo</th>

                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehiculos as $vehiculo)
                            <tr>
                                <td>{{ $vehiculo->idinventario}}</td>
                                <td>{{ $vehiculo->codinventario}}</td>
                                <td>{{ $vehiculo->nombreinventario}}</td>
                                <td>{{ $vehiculo->patentevehiculo}}</td>
                                <td>{{ $vehiculo->tipovehiculo}}</td>
                                <td>
                                    <img src="{{asset('/Imagenes/'.$vehiculo->fotoinventario)}}" alt="No imagen">
                                </td>
                                <td>{{ $vehiculo->estadoinventario}}</td>
                                <td>{{ $vehiculo->informacioninventario}}</td>

                                <td>
                                    <form action="{{ route('vehiculo.destroy',$vehiculo->idinventario) }}" method="POST">
                                        <a class="btn btn-sm btn-primary " href="{{ route('vehiculo.show',$vehiculo->idinventario) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                        <a class="btn btn-sm btn-success" href="{{ route('vehiculo.edit', $vehiculo->idinventario)}}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>