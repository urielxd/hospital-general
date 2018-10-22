@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12 mt-2 mb-2">
        {!! Breadcrumbs::render('pacientes') !!}
      </div>
    </div>
    <div id="app">
      <pacientes></pacientes>
    </div>
  </div>
@endsection
