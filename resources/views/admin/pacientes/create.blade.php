@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 mt-2">
        {!! Breadcrumbs::render('add-paciente') !!}
      </div>
      <div class="col-12 col-md-7 mt-3">
        <div class="card shadow">
          <div class="card-header bg-white">
            Nuevo Paciente
          </div>
          <div class="card-body bg-secondary">
            {!! Form::open(array('route' => 'pacientes.store')) !!}
              @include('admin.admin.form')
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
