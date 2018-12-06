@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-3">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Registrarme</h4>
                </div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label for="name" class="">Nombre:</label>

                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                    <input id="avatar" value="null" type="hidden" class="form-control" name="avatar">

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback d-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label for="email" class="">Correo:</label>

                                    <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback d-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label for="password" class="">Contraseña:</label>

                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback d-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="password-confirm" class="">Confirmar contraseña</label>

                                    <input id="password-confirm" type="password" class="form-control {{ $errors->has('password-confirm') ? ' is-invalid' : '' }}" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <div class="col-md-6 ">
                                        <button type="submit" class="btn btn-primary">
                                            Registrarme
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
