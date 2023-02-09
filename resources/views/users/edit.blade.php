@extends('layouts.app')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('users.update',$user->id) }}" method="post" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header card-header-primary">
                        Editar datos
                    </div>
                    <div class="card-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Nombre">
                            <label for="name">Nombre</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}" placeholder="Apellido">
                            <label for="lastname">Apellido</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="tipodeusuario" value="{{ $user->tipodeusuario }}" placeholder="Tipo Usuario">
                            <label for="tipodeusuario" class="col-sm-2 col">Tipo de Usuario</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email">
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="username" value="{{ $user->username }}" placeholder="Nombre Usuario">
                            <label for="username">Nombre de usuario</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Ingrese su contraseña solo en caso de modificarla">
                            <label for="password">contraseña</label>
                        </div>
                    </div>
                    <!--Footer-->
                    <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary"> Actualizar </button>
                    </div>
                    <!--EndFooter-->
                </div>
                </form>
            </div>
        </div>
    </div>
</div>







@endsection