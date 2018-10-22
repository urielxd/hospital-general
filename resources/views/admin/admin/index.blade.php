@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row ">
      <div class="col-12 mt-2">
        {!! Breadcrumbs::render('administradores') !!}
      </div>
      <div class="col-12 ">
        <div id="app">
          <administradores></administradores>
        </div>
      </div>
    </div>
  </div>
@endsection
