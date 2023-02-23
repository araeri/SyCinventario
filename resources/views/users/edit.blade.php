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
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">Editar datos</span>
                            <div class="float-right">
                                <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Volver') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="box box-info padding-1">
                            <div class="box-body">      
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Nombre">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastname">Apellido</label>
                                        <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}" placeholder="Apellido">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tipodeusuario">Tipo de Usuario</label>
                                        <input type="text" class="form-control" name="tipodeusuario" value="{{ $user->tipodeusuario }}" placeholder="Tipo Usuario">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="username">Nombre de usuario</label>
                                        <input type="text" class="form-control" name="username" value="{{ $user->username }}" placeholder="Nombre Usuario">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password">Contraseña</label>
                                        <input type="password" class="form-control" name="password" placeholder="Ingrese su contraseña solo en caso de modificarla">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Footer-->
                        <div class="box-footer mt20">
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