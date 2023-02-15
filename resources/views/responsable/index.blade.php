<p>holaaaaa</p>
<table class="table table-responsive table-bordered" id="datatablesSimple">
                    <thead class="thead">
                        <tr>
                            <th>Id Responsable</th>
                            <th>Nombre Entrega Responsable</th>
                            <th>Nombre Recepción Responsable</th>
                            <th>Razón Responsable</th>
                            <th>Fecha Creación</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($responsables as $responsable)
                            <tr>
                                <td>{{ $responsable->idresponsable}}</td>
                                <td>{{ $responsable->nomentresponsable }}</td>
                                <td>{{ $responsable->nomrecepresponsable }}</td>
                                <td>{{ $responsable->razonresponsable}}</td>
                                <td>{{ $responsable->created_at}}</td>

                                <td>
                                        <a class="btn btn-sm btn-primary " href="{{ route('responsable.show',$responsable->idresponsable) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                        <a class="btn btn-sm btn-success" href="{{ route('responsable.edit', $responsable->idresponsable)}}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>