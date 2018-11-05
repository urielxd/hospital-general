@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 mt-2 mb-2">
                {!! Breadcrumbs::render('diagnostico') !!}
            </div>
            <div class="col-12 ">
                <div id="app">
                    <diagnosticos></diagnosticos>
                </div>
            </div>
        </div>
    </div>
@endsection