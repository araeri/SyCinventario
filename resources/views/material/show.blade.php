@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">Ver</span>
            <div class="float-right">
                <a href="{{ route('material.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                    {{ __('Volver') }}
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{asset('/Imagenes/'.$material->fotoinventario)}}" class="img-thumbnail" alt="No imagen">
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-6">
                            <h6 class="fw-bold">IDENTIFICADOR</h6>
                            <p>{{ $material->idinventario}}</p><br>
                            <h6 class="fw-bold">NOMBRE</h6>
                            <p>{{ $material->nombreinventario }}</p><br>
                            <h6 class="fw-bold">CANTIDAD</h6>
                            <p>{{ $material->cantidadmaterial}}</p><br>
                        </div>
                        <div class="col-6">
                            <h6 class="fw-bold">CODIGO</h6>
                            <p>{{ $material->codinventario }}</p><br>
                            <h6 class="fw-bold">ESTADO</h6>
                            <p>{{ $material->estadoinventario}}</p><br>
                        </div>
                        <div class="col-12">
                            <h6 class="fw-bold">DESCRIPCION</h6>
                            <p>{{ $material->informacioninventario}}</p><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection