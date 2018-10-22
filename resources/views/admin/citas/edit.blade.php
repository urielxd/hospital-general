@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row mt-4">
      <div class="col-12">
        {!! Breadcrumbs::render('citas-edit', $cita) !!}
      </div>
      <div class="col-12 col-md-6 offset-md-3">
        <div class="card shadow bg-secondary">
          <div class="card-header bg-white">
            <h4 class="mb-0">
              Editar cita
            </h4>
          </div>
          <div class="card-body">
            {!! Form::model($cita, array('route' => array('citas.update', $cita->id), 'method' => 'PUT')) !!}
              @include('event.form')
            {!! Form::close() !!}
          </div>
        </div>
      </div>
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
@endsection
