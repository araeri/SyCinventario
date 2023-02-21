@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">Vehiculos</span>
            <div class="float-right">
                <a href="{{ route('vehiculo.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                <img src="{{asset('/Imagenes/'.$vehiculo->fotoinventario) ?? asset('/Imagenes/sinimagen.jpg')}}" class="img" alt="No imagen" style="width: 100px; height: 100px;">
                            </td>
                            <td>{{ $vehiculo->estadoinventario}}</td>
                            <td>{{ $vehiculo->informacioninventario}}</td>

                            <td>
                                <form action="{{ route('vehiculo.destroy',$vehiculo->idinventario) }}" method="POST">
                                    <div class="btn-group-vertical">
                                        <a class="btn btn-sm btn-primary" href="{{ route('vehiculo.show',$vehiculo->idinventario) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                        <a class="btn btn-sm btn-success" href="{{ route('vehiculo.edit', $vehiculo->idinventario)}}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal"><i class="fa fa-fw fa-trash"></i> Borrar</button>
                                    </div>
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