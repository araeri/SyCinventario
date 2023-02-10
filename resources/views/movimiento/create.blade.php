<div class="card-body">
    <form method="POST" class="row g-3" action="{{ route('material.store') }}"  role="form" enctype="multipart/form-data">
        @csrf

        @include('material.form')

    </form>
</div>