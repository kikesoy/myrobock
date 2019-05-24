{{-- FLASH MESSAGES --}}
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show mb-0">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif(session('warning'))
<div class="alert alert-warning alert-dismissible fade show mb-0">
    {{ session('warning') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@elseif(session('danger'))
<div class="alert alert-danger alert-dismissible fade show mb-0">
    {{ session('danger') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
{{--FIN DE FLASH MESSAGES PARA LA VALIDACIÓN DE LOS USUARIOS--}}