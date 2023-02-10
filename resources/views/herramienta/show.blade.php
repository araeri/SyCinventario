@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">Ver</span>
            <div class="float-right">
                <a href="{{ route('herramienta.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                    {{ __('Volver') }}
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-5">
                    <img src="{{asset('/Imagenes/'.$herramienta->fotoinventario)}}" class="img-thumbnail" alt="No imagen" style="width: 400px; height: 400px;">
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="fw-bold">IDENTIFICADOR</h6>
                            <p>{{ $herramienta->idinventario}}</p><br>
                            <h6 class="fw-bold">NOMBRE</h6>
                            <p>{{ $herramienta->nombreinventario }}</p><br>
                        </div>
                        <div class="col-6">
                            <h6 class="fw-bold">CODIGO</h6>
                            <p>{{ $herramienta->codinventario }}</p><br>
                            <h6 class="fw-bold">ESTADO</h6>
                            <p>{{ $herramienta->estadoinventario}}</p><br>
                        </div>
                        <div class="col-12">
                            <h6 class="fw-bold">DESCRIPCION</h6>
                            <p>{{ $herramienta->informacioninventario}}</p><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection