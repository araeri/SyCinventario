@extends('layouts.app')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('users.store')}}" method="post" class="form-horizontal">
                @csrf
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Usuario</h4>
                        <p class="card-category">Ingresar datos</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <label for="name" class="col-sm-2 col">Nombre</label>
                            <div class="col-sm7">
                                <input type="text" class="form-control" name="name" placeholder="Ingrese su nombre" value="{{ old('name')}}">
                                @if ($errors->has('name'))
                                    <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label for="lastname" class="col-sm-2 col">Apellido</label>
                            <div class="col-sm7">
                                <input type="text" class="form-control" name="lastname" placeholder="Ingrese su apellido" value="{{ old('lastname') }}">
                                @if ($errors->has('lastname'))
                                    <span class="error text-danger" for="input-name">{{ $errors->first('lastname') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label for="tipodeusuario" class="col-sm-2 col">Tipo de usuario</label>
                            <div class="col-sm7">
                                <input type="text" class="form-control" name="tipodeusuario" placeholder="Ingrese su tipo de usuario" value="{{ old('tipodeusuario') }}">
                                @if ($errors->has('tipodeusuario'))
                                    <span class="error text-danger" for="input-name">{{ $errors->first('tipodeusuario') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label for="email" class="col-sm-2 col">email</label>
                            <div class="col-sm7">
                                <input type="text" class="form-control" name="email" placeholder="Ingrese su correo" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="error text-danger" for="input-name">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label for="username" class="col-sm-2 col">Nombre de usuario</label>
                            <div class="col-sm7">
                                <input type="text" class="form-control" name="username" placeholder="Ingrese su nombre de usuario" value="{{ old('username') }}">
                                @if ($errors->has('username'))
                                    <span class="error text-danger" for="input-name">{{ $errors->first('username') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <label for="password" class="col-sm-2 col">contraseña</label>
                            <div class="col-sm7">
                                <input type="password" class="form-control" name="password" placeholder="Ingrese su contraseña">
                                @if ($errors->has('password'))
                                    <span class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--Footer-->
                    <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary"> Guardar</button>
                    </div>
                    <!--EndFooter-->
                </div>
                </form>
            </div>
        </div>
    </div>
</div>







@endsection