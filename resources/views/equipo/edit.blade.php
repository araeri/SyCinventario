@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">Editar</span>
            <div class="float-right">
                <a href="{{ route('equipo.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                    {{ __('Volver') }}
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <form method="post" action="{{ url('/equipo/'.$equipo->idinventario) }}">
            @csrf
            {{ method_field('PATCH')}}
            
            @include('equipo.form')
        </form>
    </div>
</div>
@endsection