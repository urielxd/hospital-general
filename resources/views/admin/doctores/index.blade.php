@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12 mt-2 mb-2">
        {!! Breadcrumbs::render('doctores') !!}
      </div>
    </div>
    <div id="app">
      <doctores></doctores>
    </div>
  </div>
@endsection
