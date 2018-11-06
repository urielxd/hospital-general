<div class="container mt-4">
  <div class="row">
    <div class="col-12">      
      <div class="btn-group">
        <a href="{{ route('diagnostico.index') }}" class="btn btn-primary text-white mb-3">
          Historial de diagnosticos
        </a>
        <a href="{{ route('perfil.edit', Auth::user()->profile['id']) }}" class="btn btn-dark text-white mb-3">
          Editar perfil
        </a>
      </div>
    </div>
    <div class="col-12">
      <div class="alert alert-warning">
        Presiona click en la cita para agregar un diagnostico.
      </div>
    </div>
    <div class="col-6">
      <h4 class="display-4 line-text position-relative">
        Citas pendientes
      </h4>
    </div>
    <div class="col-12" style="margin-top: 2em">
      <div id="calendar"></div>
    </div>
  </div>
</div>

@section('js')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
      $('#calendar').fullCalendar({
        locale: 'es',
        selectable: true,
        eventClick: function(calEvent, jsEvent, view) {
          let id = calEvent.id;
          swal({
            title: "¿Escribir diagnostico?",
            text: "",
            buttons: ['Cerrar', 'Escribir diagnostico'],
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.location.assign(`/diagnostico/${id}/create` )
            } 
          });

        },
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


