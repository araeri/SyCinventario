@extends('layouts.app')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        Usuarios
                        <!-- <p class="card-category">usuarios lista</p> -->
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success" role="success">
                            {{session('success')}}
                        </div>
                        @endif
                        <div class = "row">
                            <div class="col-12 text-left">
                                <a href="{{route('users.create')}}" class="btn btn-sm btn-primary my-4 float-end">Añadir Usuario</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle table-hover table-borderless">
                                <thead class="bg-secondary text-white">
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Tipo de Usuario</th>
                                    <th>Email</th>
                                    <th>Nombre de Usuario</th>
                                    <th>Creado en</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->lastname}}</td>
                                        <td>{{$user->tipodeusuario}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td class="text-right"> 
                                            <ul class="pagination pagination-sm">
                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning rounded-start btn-sm">Editar</a>
                                                <form action="{{ route('users.delete',$user->id) }}" method="POST" style="display: inline" onsubmit="return confirm('¿ Seguro de eliminar al usuario ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger rounded-end btn-sm" type="submit">Borrar</button>
                                                </form>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer mr-auto">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection