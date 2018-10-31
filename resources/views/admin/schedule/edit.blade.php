@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-default">
                    Editar Horario de: <strong>{{ $horario->user->name }}</strong>
                </div>
            </div>
            <div class="col-12 mt-2">
                <div class="card">
                    <div class="card-body">
                        {!! Form::model($horario, array('route' => array('horarios.update', $horario->id), 'method' => 'PUT')) !!}
                           <div id="app" class="col-12">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="">Dia y hora de empiezo</label>
                                        <input-date name="start"></input-date>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="">Dia y hora de terminación</label>
                                        <input-date name="end"></input-date>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <div class="input-group-alternative">
                                            {{ Form::number('interval', null, ['class' => 'form-control form-control-alternativo', 'placeholder' => 'Tiempo aproximado en minutos por cita. Ej. 40', 'required' => true]) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary">
                                        Asignar horario
                                    </button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
