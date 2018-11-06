@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12 mt-2">
                {!! Breadcrumbs::render('profileEdit', Auth::user()->profile) !!}
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar perfil</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::model(Auth::user()->profile, array('route' => array('perfil.update', Auth::user()->profile->id ), 'method' => 'PUT')) !!}
                            <div class="row">
                                @include('profile.form')
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection