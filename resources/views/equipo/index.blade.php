@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">Equipos</span>
            <div class="float-right">
                <a href="{{ route('equipo.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                    <i class="fas fa-add"></i> {{ __('Nuevo') }}
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table align-middle bg-white table-hover table-borderless">
                <thead class="bg-light text-secondary">
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
                            <td>
                                <img src="{{asset('/Imagenes/'.$equipo->fotoinventario) ?? asset('/Imagenes/sinimagen.jpg')}}" class="img" alt="No imagen" style="width: 100px; height: 100px;">
                            </td>
                            <td>{{ $equipo->estadoinventario}}</td>
                            <td>{{ $equipo->informacioninventario}}</td>

                            <td>
                                <form action="{{ route('equipo.destroy',$equipo->idinventario) }}" method="POST">
                                    <a class="btn btn-sm btn-primary " href="{{ route('equipo.show',$equipo->idinventario) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                    <a class="btn btn-sm btn-success" href="{{ route('equipo.edit', $equipo->idinventario)}}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection