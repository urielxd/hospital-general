<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>Hospital General</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" integrity="sha384-kW+oWsYx3YpxvjtZjFXqazFpA7UP/MbiY4jvs+RWZo2+N94PFZ36T6TFkc9O3qoB" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/argon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nucleo/css/nucleo-svg.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nucleo/css/nucleo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/css/bootstrap-material-datetimepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css">
    <link rel="stylesheet" media="print" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.print.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
      .select2-selection.select2-selection--single {
        display: block !important;
        width: 100% !important;
        height: calc(2.75rem + 2px) !important;

        font-size: 1rem !important;
        color: #8898aa !important;
        background-color: #fff !important;
        background-clip: padding-box !important;
        border: 1px solid #cad1d7 !important;
        border-radius: 0.25rem !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        -webkit-transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55) !important;
        transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55) !important;
      }
      .select2-container--bootstrap4 .select2-selection--single .select2-selection__rendered {
        line-height: 1.5 !important;
        color: #8898aa !important;
        font-size: 0.875rem !important;
        padding: 0.625rem 0.75rem;
      }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom border-light">
      <div class="container">
        <a class="navbar-brand" href="/">
          <img src="{{ asset('img/logo-2.png') }}" alt="" class="img-fluid">
        </a>
        <a class="navbar-brand" href="/">Hospital General Dr.Pedro Espinoza Rueda</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-inner-primary" aria-controls="nav-inner-primary" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="nav-inner-primary">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-inner-primary" aria-controls="nav-inner-primary" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <ul class="navbar-nav ml-lg-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">Inicio
                <span class="sr-only">(current)</span>
              </a>
            </li>
            @if (Auth::user())
                <li class="nav-item dropdown">
                  <a class="nav-link" href="#" id="nav-inner-primary_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                    <i class="ni ni-bold-down" style="margin-top: 2px"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="nav-inner-primary_dropdown_1">
                    {{-- <a class="dropdown-item" href="#">Cuenta</a>
                    <a class="dropdown-item" href="#">Panel</a>
                    <div class="dropdown-divider"></div> --}}
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Cerrar sesión
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  </div>
                </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>

    <div id="">
      <div class="container">
        <div class="row">
          <div class="col-12">
              @if(Session::has('message'))
                <p class="alert alert-primary">
                  {{ Session::get('message') }}
                </p>
              @endif
          </div>
        </div>
      </div>
      @yield('content')
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script>
      $(document).ready(function() {
        $('.datepicker').datepicker();
      });
    </script>
    <script>
      $(document).ready(function() {
        $('.select2').select2({
          theme: "bootstrap4"
        });
      });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/es.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script src="https://fullcalendar.io/releases/fullcalendar-scheduler/1.9.4/scheduler.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-datetimepicker/2.7.1/js/bootstrap-material-datetimepicker.min.js"></script>
    <script src="{{ asset('js/sweetalert2.all.js') }}"></script>
    @include('sweetalert::alert')
    @yield('js')
</body>
</html>
