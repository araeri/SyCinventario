@extends('layouts.app')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form action="{{route('users.store')}}" method="post" class="form-horizontal">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">Ingresar datos</span>
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
                                            <input type="text" class="form-control" name="name" placeholder="Ingrese su nombre" value="{{ old('name')}}">
                                            @if ($errors->has('name'))
                                                <span class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                            @endif
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lastname">Apellido</label>
                                            <input type="text" class="form-control" name="lastname" placeholder="Ingrese su apellido" value="{{ old('lastname') }}">
                                            @if ($errors->has('lastname'))
                                                <span class="error text-danger" for="input-name">{{ $errors->first('lastname') }}</span>
                                            @endif
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="tipodeusuario">Tipo de usuario</label>
                                            <input type="text" class="form-control" name="tipodeusuario" placeholder="Ingrese su tipo de usuario" value="{{ old('tipodeusuario') }}">
                                            @if ($errors->has('tipodeusuario'))
                                                <span class="error text-danger" for="input-name">{{ $errors->first('tipodeusuario') }}</span>
                                            @endif
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email">Correo Electrónico</label>
                                            <input type="text" class="form-control" name="email" placeholder="Ingrese su correo" value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="error text-danger" for="input-name">{{ $errors->first('email') }}</span>
                                            @endif
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="username">Nombre de usuario</label>
                                            <input type="text" class="form-control" name="username" placeholder="Ingrese su nombre de usuario" value="{{ old('username') }}">
                                            @if ($errors->has('username'))
                                                <span class="error text-danger" for="input-name">{{ $errors->first('username') }}</span>
                                            @endif
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="password">Contraseña</label>
                                            <input type="password" class="form-control" name="password" placeholder="Ingrese su contraseña">
                                            @if ($errors->has('password'))
                                                <span class="error text-danger" for="input-name">{{ $errors->first('password') }}</span>
                                            @endif
                                    </div>
                                </div>
                            </div>
                            <!--Footer-->
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary"> Guardar</button>
                            </div>
                            <!--EndFooter-->
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection