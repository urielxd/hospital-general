@extends('layouts.app')

@section('content')
  <div class="container mt-3">
    <div class="row">
      <div class="col-12">
        {!! Breadcrumbs::render('citas') !!}
      </div>
    </div>
  </div>
  <div id="app">
    <citas :especialidades="{{ $especialidades }}"></citas>
  </div>
@endsection
