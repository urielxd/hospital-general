<div class="col-12">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-inner--text"><strong>Atención!</strong> selecciona la especialidad que deseas agendar la cita.</span>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    </div>
</div>
@foreach ($especialidad as $e)
    @if ($e->profile->count() > 0)
    <div class="col-12 col-md-4">
        <div class="card mb-2">
        <div class="card-body">
            <h4 class="text-center" style="font-size: 1.1rem;font-weight: 600">
            {{ $e->name }}
            </h4>
            <div class="row">
            @foreach ($e->profile as $doc)
                <div class="col-12">
                    <div class="text-center">
                        {{-- <img src="{{ $doc->user->avatar }}" class="rounded-circle"  style="float:left;margin-right: 5px;width: 35px" alt=""> --}}
                        <span class="badge badge-pill badge-primary" style="margin-top:7px">
                        {{ $doc->nombre }} {{ $doc->apellido }}
                        </span>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        <div class="card-footer">
            <div class="text-center">
                <a href="{{ route('add_event', $e->id) }}" class="btn btn-icon btn-3 btn-outline-default" >
                <span class="btn-inner--icon"><i class="ni ni-active-40"></i></span>
                    <span class="btn-inner--text">Seleccionar</span>
                </a>
            </div>
        </div>
        </div>
    </div>
    @endif
@endforeach