@extends('layouts.app')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-6 offset-lg-3 offset-md-3 col-md-6">
        <div class="card shadow mt-3">
            <div class="card-body">
                @if (Auth::user())
                    <img src="{{ Auth::user()->avatar }}" alt="" style="float:left" class="img-fluid rounded-circle shadow">
                    <h4 class="d-block" style="margin-left: 2.8em;margin-bottom: -.3em">
                        {{ Auth::user()->name }}
                    </h4>
                    <span style="margin-left: 2em" class="text-center badge badge-pill badge-primary">
                        {{ Auth::user()->email }}
                    </span>
                    <div class="text-center">
                        <button class="btn btn-primary mt-3">
                            Ir al panel de administración
                        </button>
                    </div>
                @else
                    <h4 class="display-4 text-center">
                        Inicia sesión
                    </h4>
                    <a class="btn btn-neutral btn-icon btn-block btn-lg" href="{{ Route('social.auth', 'google')  }}">
                        <span class="btn-inner--icon">
                            <img src="{{ asset('img/google.svg') }}" alt="">
                        </span>
                        <span class="btn-inner--text">Entrar con google</span>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
