@extends('layouts.app')

@section('content')
  @if (Auth::user()->role == 'paciente')
    @include('paciente.home')
  @endif
  @if (Auth::user()->role == 'doctor')
    @include('doctor.home')
  @endif
  @if (Auth::user()->role == 'admin')
    @include('admin.home')
  @endif
@endsection

