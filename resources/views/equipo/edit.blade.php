<div class="card mt-4">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span id="card_title">Editar Estudiante</span>
                    <div class="float-right">
                        <a href="{{ route('herramienta.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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