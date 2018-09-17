@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <div class="row">
      <div class="col-12 col-md-4">
        <div class="card">
          <div class="card-header">
            Agendar cita
          </div>
          <div class="card-body">
            {!! Form::open(array('route' => 'cita.store')) !!}
              <div class="row">
                @include('event.form')
              </div>
            {!! Form::close() !!}
        </div>
      </div>
    </div>
    <div class="col-12 col-md-8">
      <div id="calendar"></div>
    </div>
  </div>
@endsection

@section('js')
  <script>
    $('#datepicker').bootstrapMaterialDatePicker({
      lang: 'es',
      format : 'YYYY/MM/DD HH:mm',
      shortTime: true
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
