@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <div class="row">

      <div class="col-12">
        <h4 class="">
          <strong> Selecciona una opción</strong>
        </h4>
        <hr>
      </div>

      <div class="col-md-4 mb-2 col-12">
        <div class="card">
          <div class="card-body">
            <div class="text-center">
              <img src="{{ asset('images/calendario.png') }}" style="width: 64px" alt="" class="card-img-top">
              <h4 class="mb-2">Citas</h4>
              <button class="btn btn-primary">
                Administrar
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-2 col-12">
        <div class="card">
          <div class="card-body">
            <div class="text-center">
              <img src="{{ asset('images/doctor.png') }}" style="width: 64px" alt="" class="card-img-top">
              <h4 class="mb-2">Doctores</h4>
              <button class="btn btn-primary">
                Administrar
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-2 col-12">
        <div class="card">
          <div class="card-body">
            <div class="text-center">
              <img src="{{ asset('images/paciente.png') }}" style="width: 64px" alt="" class="card-img-top">
              <h4 class="mb-2">Pacientes</h4>
              <button class="btn btn-primary">
                Administrar
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-2 col-12">
        <div class="card">
          <div class="card-body">
            <div class="text-center">
              <img src="{{ asset('images/especialidad.png') }}" style="width: 64px" alt="" class="card-img-top">
              <h4 class="mb-2">Especialidades</h4>
              <a href="{{ route('especialidades.index') }}" class="text-white btn btn-primary">
                Administrar
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 mb-2 col-12">
        <div class="card">
          <div class="card-body">
            <div class="text-center">
              <img src="{{ asset('images/horario.png') }}" style="width: 64px" alt="" class="card-img-top">
              <h4 class="mb-2">Horarios</h4>
              <button class="btn btn-primary">
                Administrar
              </button>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
@endsection
