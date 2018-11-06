@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(array('route' => array('admin.profile_store', $user->id))) !!}
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
                                        {{ Form::text('nombre', null, $attributes = $errors->has('nombre') ? array('placeholder' => 'Nombre(s)', 'class' => 'form-control is-invalid') : array('placeholder' => 'Nombre(s)', 'class' => 'form-control') ) }}
                                        @if ($errors->has('nombre'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('nombre') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group{{ $errors->has('apellido') ? ' has-danger' : '' }}">
                                        {{ Form::text('apellido', null, $attributes = $errors->has('apellido') ? array('placeholder' => 'Apellido(s)', 'class' => 'form-control is-invalid') : array('placeholder' => 'Apellido(s)', 'class' => 'form-control') ) }}
                                        @if ($errors->has('apellido'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('apellido') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-danger' : '' }}">
                                        <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        {{ Form::text('fecha_nacimiento', null, $attributes = $errors->has('fecha_nacimiento') ? array('placeholder' => 'Fecha de nacimiento', 'class' => 'form-control  datepicker is-invalid', 'value' => "06/20/2018") : array('placeholder' => 'Fecha de nacimiento', 'class' => 'form-control  datepicker', 'value' => "06/20/2018") ) }}
                                        </div>
                                        @if ($errors->has('fecha_nacimiento'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group{{ $errors->has('curp') ? ' has-danger' : '' }}">
                                        {{ Form::text('curp', null, $attributes = $errors->has('curp') ? array('placeholder' => 'Curp', 'class' => 'form-control is-invalid') : array('placeholder' => 'Curp', 'class' => 'form-control') ) }}
                                        @if ($errors->has('curp'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('curp') }}</strong>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group{{ $errors->has('especialidad_id') ? ' has-danger' : '' }}">
                                    {{ Form::select('especialidad_id', $especialidad, null, $attributes = $errors->has('especialidad_id') ? array('placeholder' => 'Especialidad', 'class' => 'form-control is-invalid') : array('placeholder' => 'Especialidad', 'class' => 'form-control') ) }}
                                    @if ($errors->has('especialidad_id'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('especialidad_id') }}</strong>
                                        </div>
                                    @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group{{ $errors->has('cedula_profesional') ? ' has-danger' : '' }}">
                                        {{ Form::text('cedula_profesional', null, $attributes = $errors->has('cedula_profesional') ? array('placeholder' => 'Cedula Profesional', 'class' => 'form-control is-invalid') : array('placeholder' => 'Cedula Profesional', 'class' => 'form-control') ) }}
                                        @if ($errors->has('cedula_profesional'))
                                            <div class="invalid-feedback">
                                                <strong>{{ $errors->first('cedula_profesional') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12">
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