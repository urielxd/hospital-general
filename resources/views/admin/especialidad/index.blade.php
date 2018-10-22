@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <div class="row">
      <div class="col-12">
        {!! Breadcrumbs::render('especialidades') !!}
      </div>
      <div class="col-12">
        <a href="{{ route('especialidades.create') }}" class="btn btn-primary text-white mb-3">
          Nueva especialidad
        </a>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-header border-0 bg-transparent">
            <h4 class="mb-0">Especialidades</h4>
          </div>
          <table class="table">
            <thead class="thead-light">
              <tr>
                <th></th>
                <th>Nombre</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($especialidades as $especialidad)
                <tr>
                  <td></td>
                  <td>{{ $especialidad->name }}</td>
                  <td>
                    <div class="btn-group">
                      <a href="{{ route('especialidades.edit', $especialidad->id) }}" class="btn btn-secondary">
                        <i class="fa fa-edit"></i>
                      </a>
                      {!! Form::open(array( 'route' => ['especialidades.destroy', $especialidad->id], 'method' => 'DELETE' )) !!}
                        <button class="btn btn-danger">
                          <i class="fa fa-trash"></i>
                        </button>
                      {!! Form::close() !!}
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="card-footer">
            {{ $especialidades->links("pagination::bootstrap-4") }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
