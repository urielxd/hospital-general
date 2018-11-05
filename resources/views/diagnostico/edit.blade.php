@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 mt-2 mb-2">
                {!! Breadcrumbs::render('edit-diagnostico', $diagnostico) !!}
            </div>
            <div class="col-md-6 col-12 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ $diagnostico->user['avatar'] }}" style="width: 40px;" alt="" class="rounded-circle">
                            </div>
                            <div class="col-10">
                                <h4>{{ $diagnostico->user['name'] }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                {!! Form::model($diagnostico, array('route' => array('diagnostico.update', $diagnostico->id), 'method' => 'PUT')) !!}
                    @include('diagnostico.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection