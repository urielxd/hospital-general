@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-12">
        {!! Breadcrumbs::render('especialidades-new') !!}
      </div>
      <div class="col-md-6 col-12">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white bg-transparent">
            <h4>Nueva especialidad</h4>
          </div>
          <div class="card-body">
            {!! Form::open(array( 'route' => 'especialidades.store' )) !!}
              <div class="row">
                @include('admin.especialidad.form')
                <div class="col-12 mt-2">
                  <button class="btn btn-primary">
                    Guardar
                  </button>
                </div>
              </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
