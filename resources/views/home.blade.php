@extends('layouts.app')

@section('content')
  @if (Auth::user()->role == 'paciente')
    @include('paciente.home')
  @endif
  @if (Auth::user()->role == 'doctor')
    @include('doctor.home')
  @endif
  @if (Auth::user()->role == 'admin')
    @include('admin.home')
  @endif
@endsection


@section('js')
  <script>
    $('#calendar').fullCalendar({
      locale: 'es',
      selectable: true,
      buttonText: {
        today:    'Hoy',
        month:    'Mes',
        week:     'Semana',
        day:      'Dia',
        list:     'Lista'
      },
      defaultView: 'listDay',
      header: {
        center: 'title',
        left:  'today prev,next',
        right: 'month,year,agendaWeek,listDay'
      },
      eventSources: [
        {
         url: '/myevents',
          color: '#16284e',
          textColor: '#FFF'
        }
      ]
    });
  </script>
@endsection
