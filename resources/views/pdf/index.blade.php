@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-6">
                <div class="btn-group">
                    <a href="{{ route('home') }}" class="btn btn-dark">
                        Regresar al inicio
                    </a>
                    <a href="{{ route('make.pdf', $id) }}" target="_blank" class="btn btn-primary">
                        Imprimir Cita
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection