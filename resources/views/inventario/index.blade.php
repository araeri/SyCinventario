@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">Inventarios</span>
            <div class="float-right">
                {{-- <a href="{{ route('equipo.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                    <i class="fas fa-add"></i> {{ __('Nuevo') }}
                </a> --}}
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="datatablesSimple">
                <thead >
                    <tr>
                        <th>Id</th>
                        <th>CodInventario</th>
                        <th>Nombre Inventario</th>
                        <th>Tipo Inventario</th>
                        <th>Foto</th>
                        <th>Estado Inventario</th>
                        <th>Infomación Inventario</th>

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
                            <td>
                                <img src="{{asset('/storage/Imagenes/'.$inventario->fotoinventario)}}" alt="No imagen">
                            </td>
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
        </div>
    </div>
</div>
@endsection