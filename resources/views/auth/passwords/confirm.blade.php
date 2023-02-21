@extends('layouts.inicio')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header text-center py-4">{{ __('Confirmar Contraseña') }}</div>

                <div class="card-body">
                    {{ __('Por favor, confirme su contraseña antes de continuar.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="form-floating mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Contraseña">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="password">{{ __('Contraseña') }}</label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn text-white btn-warning">
                                {{ __('Confirmar Contraseña') }}
                            </button>
                        </div>

                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
