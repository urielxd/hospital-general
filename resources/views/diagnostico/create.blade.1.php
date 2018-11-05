@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 mt-2 mb-2">
                {!! Breadcrumbs::render('edit-diagnostico', $event) !!}
            </div>
            <div class="col-12">
                {!! Form::model($diagnostic, array('route' => array('diagnostico.update', $event->id), 'method' => 'PUT') ) !!}
                    @include('diagnostico.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection