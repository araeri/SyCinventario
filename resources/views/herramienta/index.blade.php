@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">Herramientas</span>
            <div class="float-right">
                <a href="{{ route('herramienta.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                    <i class="fas fa-add"></i> {{ __('Nuevo') }}
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Codherramienta</th>
                        <th>Nombre Herramienta</th>
                        <th>Foto</th>
                        <th>Estado Herramienta</th>
                        <th>Infomación Herramienta</th>

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
                                <img src="{{asset('/Imagenes/'.$herramienta->fotoinventario) ?? asset('/Imagenes/sinimagen.jpg')}}" class="img" alt="No imagen" style="width: 100px; height: 100px;">
                            </td>
                            <td>{{ $herramienta->estadoinventario}}</td>
                            <td>{{ $herramienta->informacioninventario}}</td>

                            <td>
                                <form action="{{ route('herramienta.destroy',$herramienta->idinventario) }}" method="POST">
                                    <div class="btn-group-vertical">
                                    <a class="btn btn-sm btn-primary " href="{{ route('herramienta.show',$herramienta->idinventario) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                    <a class="btn btn-sm btn-success" href="{{ route('herramienta.edit', $herramienta->idinventario)}}"><i class="fa fa-fw fa-edit"></i> Editar</a>
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