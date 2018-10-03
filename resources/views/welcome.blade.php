<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hospital General</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/argon.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded ">
          <div class="container">
            <a class="navbar-brand" href="#">Hospital General</a>
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
                  <a class="nav-link" href="#">Ayuda
                    <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Acerca de</a>
                </li>
                @if (Auth::user())
                    <li class="nav-item dropdown">
                      <a class="nav-link" href="#" id="nav-inner-primary_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="nav-inner-primary_dropdown_1">
                        <a class="dropdown-item" href="#">Cuenta</a>
                        <a class="dropdown-item" href="#">Panel</a>
                        <div class="dropdown-divider"></div>
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
        <div class="header w-100 position-relative bg-primary">
            <div class="container mt-3">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6">
                        <div class="card shadow mt-3">
                            <div class="card-body">
                                @if (Auth::user())
                                    <img src="{{ Auth::user()->avatar }}" alt="" style="float:left" class="img-fluid rounded-circle shadow" style="width: 50px">
                                    <h4 class="d-block" style="margin-left: 2.8em;margin-bottom: -.3em">
                                        {{ Auth::user()->name }}
                                    </h4>
                                    <span style="margin-left: 2em" class="text-center badge badge-pill badge-primary">
                                        {{ Auth::user()->email }}
                                    </span>
                                    <div class="text-center">
                                        <a href="{{ route('home') }}" class="btn btn-primary mt-3">
                                            Ir al panel de administración
                                        </a>
                                    </div>
                                @else
                                    <h4 class="display-4 text-center">
                                        HOSPITAL REGIONAL
                                        <br>
                                        “DOCTOR PEDRO ESPINOZA RUEDA”
                                    </h4>
                                    <a class="btn btn-neutral btn-icon btn-block btn-lg" href="{{ Route('social.auth', 'google')  }}">
                                        <span class="btn-inner--icon">
                                            <img src="{{ asset('img/google.svg') }}" alt="">
                                        </span>
                                        <span class="btn-inner--text">Entrar con google</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-6 col-lg-6">
                        <div class="position-relative w-100 h-100 d-none d-md-block d-lg-block">
                            <img src="{{ asset('img/doctor.svg') }}" class="position-absolute img-fluid" style="left:50%;top:14%;margin:auto" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="w-100 h-100 position-relative" style="margin-top: 4em;margin-bottom: 4em">
            <div class="container">
                <h4 class="line-text display-4 mb-3 mt-2 position-relative" >
                    Especialidades

                </h4>
                <div class="row" style="margin-top: 2em">
                    @foreach ($especialidad as $e)
                        @if ($e->profile->count() > 0)
                          <div class="col-12 col-md-4 card-lift--hover">
                            <div class="card mb-2">
                              <div class="card-body">
                                <h4 class="text-center" style="font-size: 1.1rem;font-weight: 600">
                                  {{ $e->name }}
                                </h4>
                                <div class="row">
                                  @foreach ($e->profile as $doc)
                                    <div class="col-12">
                                      <div class="">
                                        <img src="{{ $doc->user->avatar }}" class="rounded-circle"  style="float:left;margin-right: 5px;width: 35px" alt="">
                                        <span class="badge badge-pill badge-primary" style="margin-top:7px">
                                          {{ $doc->nombre }} {{ $doc->apellido }}
                                        </span>
                                      </div>
                                    </div>
                                  @endforeach
                                </div>
                              </div>
                              <div class="card-footer">
                                  <div class="text-center">
                                    <a href="{{ route('add_event', $e->id) }}" class="btn btn-icon btn-3 btn-outline-default" >
                                      <span class="btn-inner--icon"><i class="ni ni-active-40"></i></span>
                                        <span class="btn-inner--text">Agendar</span>
                                    </a>
                                  </div>
                              </div>
                            </div>
                          </div>
                        @endif
                      @endforeach

                </div>
            </div>
        </section>
        <section class="header position-relative w-100 bg-secondary">
            <div class="container">
                <div class="row" style="margin-top: 4em;margin-bottom: 4em;">
                    <div class="col-12 col-lg-6 col-md-6">
                        <h4 class="line-text display-4 mb-3 mt-4 position-relative" >
                            Misión

                        </h4>
                        <p class="mt-4">
                            Brindar  atención médica de segundo nivel de atención en las cuatro especialidades básicas: Gineco-Obstetricia, Pediatría, Medicina Interna, Cirugía General y Urgencias las 24 Horas del día con apoyo de  los auxiliares de diagnóstico y tratamiento, con eficacia, eficiencia, equidad, y con calidad y calidez a la población del área de influencia Hospital.
                        </p>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 d-none d-md-block d-lg-block">
                        <img src="{{ asset('img/mision.jpeg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 d-none d-md-block d-lg-block">
                        <img src="{{ asset('img/vision.jpeg') }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <h4 class="line-text display-4 mb-3 mt-4 position-relative" >
                            Visión

                        </h4>
                        <p class="mt-4">
                            Construirse con un hospital líder en la costa chica de Oaxaca con mejora continua en la calidad de la atención para poder satisfacer paulatinamente el incremento en la demanda de los servicios de la población del área de influencia y con ello contribuir a la satisfacción de sus necesidades y mejorar con la calidad de vida y la salud publica en la región.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <div class=" w-100 position-relative ">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 col-md-6 mt-4">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15314.100179532446!2d-98.048398!3d16.3471949!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x51dff3b2135c0e5f!2sHospital+Regional+%22Doctor+Pedro+Espinosa+Rueda%22!5e0!3m2!1ses-419!2smx!4v1537047113311" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <h4 class="line-text display-4 mb-3 mt-4 position-relative" >
                            Contáctanos

                        </h4>
                        <div class="row mt-4">
                            <div class="col-12">
                              <div class="form-group">
                                <input type="email" class="form-control form-control-alternative" id="" placeholder="Nombre completo">
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <input type="email" class="form-control form-control-alternative" id="" placeholder="Correo electrónico">
                              </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Motivo del mensaje"></textarea>
                                </div>
                            </div>
                             <div class="col-12">
                                <div class="form-group">
                                    <button class="btn btn-primary float-right">
                                        Enviar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
