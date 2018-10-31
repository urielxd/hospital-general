@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <div class="row">
      <div class="col-12">
        {!! Breadcrumbs::render('especialidad-paciente') !!}
      </div>
      @include('partials.especialidades')
    </div>
  </div>
@endsection
