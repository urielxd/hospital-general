@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <div class="row">
      <div class="col-12 col-md-8 col-lg-8 offset-md-2">
        <div class="card">
          <div class="card-header">
            <h4>Nuevo perfil</h4>
          </div>
          <div class="card-body">
              {!! Form::open(array('route' => 'perfil.store')) !!}
                <div class="row">
                  @include('profile.form')
                </div>
              {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
