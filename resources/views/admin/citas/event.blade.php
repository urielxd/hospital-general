@extends('layouts.app')

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-12 mb-2">
                {!! Breadcrumbs::render('paciente-nueva-cita', $user) !!}
            </div>
            <div class="col-12">
                <div class="alert alert-default">
                    Agendando cita para: <strong>{{ $user->name }}</strong>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card">
                    <div class="card-header">
                        Agendar cita
                    </div>
                    <div class="card-body">
                        {!! Form::open(array('route' => 'store_event')) !!}
                            <div class="col-md-12 col-12">
                                {!! Form::hidden('user_id', $user->id) !!}
                                <div class="form-group{{ $errors->has('doctor') ? ' has-danger' : '' }}">
                                    {{ Form::select('doctor', $doctores, null, $attributes = $errors->has('doctor') ? array('placeholder' => 'Selecciona el doctor', 'class' => 'form-control is-invalid', 'required') : array('placeholder' => 'Selecciona el doctor', 'class' => 'form-control', 'required') ) }}
                                    @if ($errors->has('doctor'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('doctor') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <div id="app">
                                    <input-date name="start"></input-date>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <button class="btn btn-primary">
                                    Agendar
                                    </button>
                                </div>
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
@endsection

@section('js')
  <script>
    $('#datepicker').bootstrapMaterialDatePicker({
      lang: 'es',
      format : 'YYYY/MM/DD HH:mm',
      shortTime: true,
      daysOfWeekDisabled: [6, 7]
    });
  </script>
  <script>
    $('#calendar').fullCalendar({
      locale: 'es',
      buttonText: {
        today:    'Hoy',
        month:    'Mes',
        week:     'Semana',
        day:      'Dia',
        list:     'Lista'
      },
      defaultView: 'agendaWeek',
      header: {
        center: '',
        left:  'today prev,next',
        right: 'agendaWeek'
      },
      eventSources: [
        {
          url: '/allevent',
          color: '#16284e',
          textColor: '#FFF'
        }
      ]
    });
  </script>
@endsection