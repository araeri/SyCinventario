@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">Crear</span>
            <div class="float-right">
                <a href="{{ route('vehiculo.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                    {{ __('Volver') }}
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="POST" class="row g-3" action="{{ route('vehiculo.store') }}"  role="form" enctype="multipart/form-data">
            @csrf

            @include('vehiculo.form')

        </form>
    </div>
</div>
@endsection