<div class="card mt-4">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span id="card_title">Editar Estudiante</span>
                    <div class="float-right">
                        <a href="{{ route('vehiculo.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                            {{ __('Volver') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ url('/vehiculo/'.$vehiculo->idinventariofk) }}">
                    @csrf
                    {{ method_field('PATCH')}}
                    
                    @include('vehiculo.form')
                </form>
            </div>
        </div>