<div class="card mt-4">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span id="card_title">Editar Herramienta</span>
                    <div class="float-right">
                        <a href="{{ route('herramienta.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                            {{ __('Volver') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ url('/herramienta/'.$herramienta->idinventario) }}" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PATCH')}}
                    
                    @include('herramienta.form')
                </form>
            </div>
        </div>