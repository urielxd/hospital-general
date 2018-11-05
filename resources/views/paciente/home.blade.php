<div class="container mt-4">
  <div class="row">
    <div class="col-6">
      <h4 class="display-4 line-text position-relative">
        Citas agendadas
      </h4>
    </div>
    <div class="col-6">
     <a href="{{ route('especialidad') }}" class="btn btn-primary float-right">
       Agendar una cita
     </a>
    </div>
    <div class="col-12" style="margin-top: 2em">
      <div id="calendar"></div>
    </div>
  </div>
</div>

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


