<p>holaaaaa</p>
<table class="table table-responsive table-bordered" id="datatablesSimple">
                    <thead class="thead">
                        <tr>
                            <th>Id</th>
                            <th>Codherramienta</th>
                            <th>Nombre Herramienta</th>
                            <th>Foto</th>
                            <th>Estado Herramienta</th>
                            <th>Infomacion Herramienta</th>

                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($herramientas as $herramienta)
                            <tr>
                                <td>{{ $herramienta->idinventario}}</td>
                                <td>{{ $herramienta->codinventario }}</td>
                                <td>{{ $herramienta->nombreinventario }}</td>
                                <td>
                                    <img src="{{asset('/Imagenes/'.$herramienta->fotoinventario)}}" alt="No imagen">
                                </td>
                                <td>{{ $herramienta->estadoinventario}}</td>
                                <td>{{ $herramienta->informacioninventario}}</td>

                                <td>
                                    <a class="btn btn-sm btn-success" href="{{ route('herramienta.edit', $herramienta->idinventario)}}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                    <form action="{{ route('herramienta.destroy',$herramienta->idinventario) }}" method="POST">
                                        <a class="btn btn-sm btn-primary " href="{{ route('herramienta.show',$herramienta->idinventario) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>