@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-default">
                    Horario para: <strong>{{ $doctor->name }}</strong>
                </div>
            </div>
            <div class="col-12 mt-2">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(array('route' => 'horarios.store')) !!}
                            @include('admin.schedule.form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
