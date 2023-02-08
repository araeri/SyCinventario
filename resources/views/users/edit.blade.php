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
                        <h4 class="card-title">Usuario</h4>
                        <p class="card-category">Editar datos</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <label for="name" class="col-sm-2 col">Nombre</label>
                            <div class="col-sm7">
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="lastname" class="col-sm-2 col">Apellido</label>
                            <div class="col-sm7">
                                <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="tipodeusuario" class="col-sm-2 col">Tipo de usuario</label>
                            <div class="col-sm7">
                                <input type="text" class="form-control" name="tipodeusuario" value="{{ $user->tipodeusuario }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="email" class="col-sm-2 col">email</label>
                            <div class="col-sm7">
                                <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="username" class="col-sm-2 col">Nombre de usuario</label>
                            <div class="col-sm7">
                                <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="password" class="col-sm-2 col">contraseña</label>
                            <div class="col-sm7">
                                <input type="password" class="form-control" name="password" placeholder="Ingrese su contraseña solo en caso de modificarla">
                            </div>
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