@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12 mt-2 mb-2">
        {!! Breadcrumbs::render('horarios') !!}
      </div>
      <div id="app" class="col-12">
        <horarios></horarios>
      </div>
    </div>
  </div>
@endsection
