@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="col-12 mt-2 mb-2">
        {!! Breadcrumbs::render('add-profile', $user->id) !!}
      </div>
    <div class="row justify-content-center">
      <div class="col-md-10 col-12">
        <div class="card shadow">
          <div class="card-header bg-white">
            <h4 class="mb-0">
              Nuevo perfil
              <small><strong>{{ $user->name }}</strong></small>
            </h4>
          </div>
          <div class="card-body bg-secondary">
            {!! Form::open(array('route' => array('pacientes.profile.store', $user->id))) !!}
              <div class="row">
                @include('admin.pacientes.form')
              </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
