@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-12 mb-2">
                {!! Breadcrumbs::render('paciente-cita') !!}
            </div>
            <div id="app" class=" col-12">
                <paciente-cita></paciente-cita>
            </div>
        </div>
    </div>
@endsection