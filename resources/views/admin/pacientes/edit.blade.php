@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 mt-2 mb-3">
        {!! Breadcrumbs::render('edit-paciente', $user) !!}
      </div>
      <div class="col-12 col-md-7">
        <div class="card shadow">
          <div class="card-header bg-white">
            <h4>Editar {{ $user->name }}</h4>
          </div>
          <div class="card-body bg-secondary">
            {!! Form::model($user, array('route' => array('pacientes.update', $user->id), 'method' => 'PUT')) !!}

            <div class="col-md-12 col-12">
              <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                {{ Form::text('name', null, $attributes = $errors->has('name') ? array('placeholder' => 'Nombre', 'class' => 'form-control form-control-alternative   is-invalid', 'required') : array('placeholder' => 'Nombre', 'class' => 'form-control form-control-alternative  ', 'required') ) }}
                  @if ($errors->has('name'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('name') }}</strong>
                    </div>
                  @endif
                </div>
              </div>
              <div class="col-md-12 col-12">
                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                  {{ Form::email('email', null, $attributes = $errors->has('email') ? array('placeholder' => 'Email', 'class' => 'form-control form-control-alternative   is-invalid', 'required') : array('placeholder' => 'Email', 'class' => 'form-control form-control-alternative  ', 'required') ) }}
                  @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </div>
                  @endif
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <button class="btn btn-primary">Guardar</button>
                </div>
              </div>

            {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
