@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">Materiales</span>
            <div class="float-right">
                <a href="{{ route('material.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                <img src="{{asset('/Imagenes/'.$material->fotoinventario)}}" class="img" alt="No imagen" style="width: 100px; height: 100px;">
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
        </div>
    </div>
</div>
@endsection