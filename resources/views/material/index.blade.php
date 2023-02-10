<p>holaaaaa</p>
<table class="table table-responsive table-bordered" id="datatablesSimple">
                    <thead class="thead">
                        <tr>
                            <th>Id</th>
                            <th>Codmaterial</th>
                            <th>Nombre material</th>
                            <th>Foto</th>
                            <th>Estado material</th>
                            <th>Cantidad material</th>
                            <th>Infomacion material</th>

                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materiales as $material)
                            <tr>
                                <td>{{ $material->idinventario}}</td>
                                <td>{{ $material->codinventario }}</td>
                                <td>{{ $material->nombreinventario }}</td>
                                <td>
                                    <img src="{{ asset('/Imagenes/'.$material->fotoinventario)}}" alt="{{$material->fotoinventario}}">
                                </td>
                                <td>{{ $material->estadoinventario}}</td>
                                <td>{{ $material->cantidadmaterial}}</td>
                                <td>{{ $material->informacioninventario}}</td>

                                <td>
                                    <form action="{{ route('material.destroy',$material->idinventario) }}" method="POST">
                                        <a class="btn btn-sm btn-primary " href="{{ route('material.show',$material->idinventario) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                        <a class="btn btn-sm btn-success" href="{{ route('material.edit', $material->idinventario)}}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>