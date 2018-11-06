<div class="col-md-6 col-12">
  <div class="form-group{{ $errors->has('nombre') ? ' has-danger' : '' }}">
    {{ Form::text('nombre', null, $attributes = $errors->has('nombre') ? array('placeholder' => 'Nombre(s)', 'class' => 'form-control is-invalid') : array('placeholder' => 'Nombre(s)', 'class' => 'form-control') ) }}
    @if ($errors->has('nombre'))
      <div class="invalid-feedback">
          <strong>{{ $errors->first('nombre') }}</strong>
      </div>
    @endif
  </div>
</div>

<div class="col-md-6 col-12">
  <div class="form-group{{ $errors->has('apellido') ? ' has-danger' : '' }}">
    {{ Form::text('apellido', null, $attributes = $errors->has('apellido') ? array('placeholder' => 'Apellido(s)', 'class' => 'form-control is-invalid') : array('placeholder' => 'Apellido(s)', 'class' => 'form-control') ) }}
    @if ($errors->has('apellido'))
      <div class="invalid-feedback">
          <strong>{{ $errors->first('apellido') }}</strong>
      </div>
    @endif
  </div>
</div>

<div class="col-md-6 col-12">
  <div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-danger' : '' }}">
    <div class="input-group ">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
      </div>
      {{ Form::text('fecha_nacimiento', null, $attributes = $errors->has('fecha_nacimiento') ? array('placeholder' => 'Fecha de nacimiento', 'class' => 'form-control  datepicker is-invalid', 'value' => "06/20/2018") : array('placeholder' => 'Fecha de nacimiento', 'class' => 'form-control  datepicker', 'value' => "06/20/2018") ) }}
    </div>
    @if ($errors->has('fecha_nacimiento'))
      <div class="invalid-feedback">
          <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
      </div>
    @endif
  </div>
</div>

<div class="col-md-6 col-12">
  <div class="form-group{{ $errors->has('curp') ? ' has-danger' : '' }}">
    {{ Form::text('curp', null, $attributes = $errors->has('curp') ? array('placeholder' => 'Curp', 'class' => 'form-control is-invalid') : array('placeholder' => 'Curp', 'class' => 'form-control') ) }}
    @if ($errors->has('curp'))
      <div class="invalid-feedback">
          <strong>{{ $errors->first('curp') }}</strong>
      </div>
    @endif
  </div>
</div>

@if (Auth::user()->role == 'doctor')
  <div class="col-md-6 col-12">
    <div class="form-group{{ $errors->has('especialidad_id') ? ' has-danger' : '' }}">
      {{ Form::select('especialidad_id', $especialidad, null, $attributes = $errors->has('especialidad_id') ? array('placeholder' => 'Especialidad', 'class' => 'form-control is-invalid') : array('placeholder' => 'Especialidad', 'class' => 'form-control') ) }}
      @if ($errors->has('especialidad_id'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('especialidad_id') }}</strong>
        </div>
      @endif
    </div>
  </div>
  <div class="col-md-6 col-12">
    <div class="form-group{{ $errors->has('cedula_profesional') ? ' has-danger' : '' }}">
      {{ Form::text('cedula_profesional', null, $attributes = $errors->has('cedula_profesional') ? array('placeholder' => 'Cedula Profesional', 'class' => 'form-control is-invalid') : array('placeholder' => 'Cedula Profesional', 'class' => 'form-control') ) }}
      @if ($errors->has('cedula_profesional'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('cedula_profesional') }}</strong>
        </div>
      @endif
    </div>
  </div>
@endif

@if (Auth::user()->role == 'paciente')
  <div class="col-md-6 col-12">
    <div class="form-group{{ $errors->has('entidad_nacimiento') ? ' has-danger' : '' }}">
      {{ Form::select('entidad_nacimiento', ['Aguascalientes','Baja California','Baja California Sur','Campeche','Chiapas','Chihuahua','Coahuila de Zaragoza','Colima','Ciudad de México','Durango','Guanajuato','Guerrero','Hidalgo','Jalisco','Mexico','Michoacan de Ocampo','Morelos','Nayarit','Nuevo Leon','Oaxaca','Puebla','Queretaro de Arteaga','Quintana Roo','San Luis Potosi','Sinaloa','Sonora','Tabasco','Tamaulipas','Tlaxcala','Veracruz-Llave','Yucatan','Zacatecas'] ,null, $attributes = $errors->has('entidad_nacimiento') ? array('placeholder' => 'Entidad de nacimiento', 'class' => 'form-control is-invalid select2') : array('placeholder' => 'Entidad de nacimiento', 'class' => 'form-control select2') ) }}
      @if ($errors->has('entidad_nacimiento'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('entidad_nacimiento') }}</strong>
        </div>
      @endif
    </div>
  </div>

  <div class="col-md-6 col-12">
    <div class="form-group{{ $errors->has('clave_de_edad') ? ' has-danger' : '' }}">
      {{ Form::text('clave_de_edad', null, $attributes = $errors->has('clave_de_edad') ? array('placeholder' => 'Clave de edad', 'class' => 'form-control is-invalid') : array('placeholder' => 'Clave de edad', 'class' => 'form-control') ) }}
      @if ($errors->has('clave_de_edad'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('clave_de_edad') }}</strong>
        </div>
      @endif
    </div>
  </div>

  <div class="col-md-6 col-12">
    <div class="form-group{{ $errors->has('sexo') ? ' has-danger' : '' }}">
      {{ Form::select('sexo', ['Hombre', 'Mujer'], null, $attributes = $errors->has('sexo') ? array('placeholder' => 'Sexo', 'class' => 'form-control is-invalid') : array('placeholder' => 'Sexo', 'class' => 'form-control') ) }}
      @if ($errors->has('sexo'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('sexo') }}</strong>
        </div>
      @endif
    </div>
  </div>

  <div class="col-md-6 col-12">
    <div class="form-group{{ $errors->has('indigena') ? ' has-danger' : '' }}">
      {{ Form::select('indigena', ['Si', 'No'], null, $attributes = $errors->has('indigena') ? array('placeholder' => 'Indigena', 'class' => 'form-control is-invalid') : array('placeholder' => 'Indigena', 'class' => 'form-control') ) }}
      @if ($errors->has('indigena'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('indigena') }}</strong>
        </div>
      @endif
    </div>
  </div>

  <div class="col-md-6 col-12">
    <div class="form-group{{ $errors->has('derechohabiencia') ? ' has-danger' : '' }}">
      {{ Form::select('derechohabiencia', ['Imss', 'Issste', 'Otra'] ,null, $attributes = $errors->has('derechohabiencia') ? array('placeholder' => 'Derechohabiencia', 'class' => 'form-control is-invalid') : array('placeholder' => 'Derechohabiencia', 'class' => 'form-control') ) }}
      @if ($errors->has('derechohabiencia'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('derechohabiencia') }}</strong>
        </div>
      @endif
    </div>
  </div>
  <div class="col-md-6 col-12">
    <div class="form-group{{ $errors->has('peso') ? ' has-danger' : '' }}">
      {{ Form::number('peso', null, $attributes = $errors->has('peso') ? array('placeholder' => 'Peso', 'class' => 'form-control is-invalid') : array('placeholder' => 'Peso', 'class' => 'form-control') ) }}
      @if ($errors->has('peso'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('peso') }}</strong>
        </div>
      @endif
    </div>
  </div>
  <div class="col-md-6 col-12">
    <div class="form-group{{ $errors->has('talla') ? ' has-danger' : '' }}">
      {{ Form::number('talla', null, $attributes = $errors->has('talla') ? array('placeholder' => 'Talla', 'class' => 'form-control is-invalid') : array('placeholder' => 'Talla', 'class' => 'form-control') ) }}
      @if ($errors->has('talla'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('talla') }}</strong>
        </div>
      @endif
    </div>
  </div>
  <div class="col-md-6 col-12">
    <div class="form-group{{ $errors->has('migrante') ? ' has-danger' : '' }}">
      {{ Form::select('migrante', ['Si', 'No'] ,null, $attributes = $errors->has('migrante') ? array('placeholder' => 'Migrante', 'class' => 'form-control is-invalid') : array('placeholder' => 'Migrante', 'class' => 'form-control') ) }}
      @if ($errors->has('migrante'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('migrante') }}</strong>
        </div>
      @endif
    </div>
  </div>

  <div class="col-md-6 col-12">
    <div class="form-group{{ $errors->has('discapacidad') ? ' has-danger' : '' }}">
      {{ Form::select('discapacidad', ['Ver', 'Escuchar', 'Caminar', 'Usar brazos / manos', 'Aprender / recordar', 'Cuidado Personal', 'Hablar / Comunicarse', 'Emocional / mental', 'Ninguna', 'Poca dificultad', 'Mucha dificultad', 'No puede hacerlo', 'Enfermedad', 'Edad avanzada', 'Nació asi', 'Accidente', 'Violencia', 'Otra causa'] ,null, $attributes = $errors->has('discapacidad') ? array('placeholder' => 'Discapacidad', 'class' => 'form-control is-invalid select2') : array('placeholder' => 'Discapacidad', 'class' => 'form-control select2') ) }}
      @if ($errors->has('discapacidad'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('discapacidad') }}</strong>
        </div>
      @endif
    </div>
  </div>

  <div class="col-md-6 col-12">
    <div class="form-group{{ $errors->has('temporal') ? ' has-danger' : '' }}">
      {{ Form::select('temporal', ['Primera vez', 'Subsecuente'] ,null, $attributes = $errors->has('temporal') ? array('placeholder' => 'Relación temporal por motivo', 'class' => 'form-control is-invalid') : array('placeholder' => 'Relación temporal por motivo', 'class' => 'form-control') ) }}
      @if ($errors->has('temporal'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('temporal') }}</strong>
        </div>
      @endif
    </div>
  </div>
  <div class="col-md-6 col-12">
    <div class="form-group{{ $errors->has('relacion') ? ' has-danger' : '' }}">
      {{ Form::select('relacion', ['Si', 'No'] ,null, $attributes = $errors->has('relacion') ? array('placeholder' => 'Seguro popular', 'class' => 'form-control is-invalid') : array('placeholder' => 'Seguro popular', 'class' => 'form-control') ) }}
      @if ($errors->has('relacion'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('relacion') }}</strong>
        </div>
      @endif
    </div>
  </div>
  <div class="col-md-6 col-12">
    <div class="form-group{{ $errors->has('temporal_2') ? ' has-danger' : '' }}">
      {{ Form::select('temporal_2', ['Si', 'No'] ,null, $attributes = $errors->has('temporal_2') ? array('placeholder' => 'Prospera', 'class' => 'form-control is-invalid') : array('placeholder' => 'Prospera', 'class' => 'form-control') ) }}
      @if ($errors->has('temporal_2'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('temporal_2') }}</strong>
        </div>
      @endif
    </div>
  </div>
  {{-- <div class="col-md-6 col-12">
    <div class="form-group{{ $errors->has('temporal') ? ' has-danger' : '' }}">
      {{ Form::text('temporal', null, $attributes = $errors->has('temporal') ? array('placeholder' => 'Relacion temporal por motivo', 'class' => 'form-control is-invalid') : array('placeholder' => 'Relacion temporal por motivo', 'class' => 'form-control') ) }}
      @if ($errors->has('temporal'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('temporal') }}</strong>
        </div>
      @endif
    </div>
  </div> --}}
  {{-- <div class="col-md-6 col-12">
    <div class="form-group{{ $errors->has('temporal_2') ? ' has-danger' : '' }}">
      {{ Form::text('temporal_2', null, $attributes = $errors->has('temporal_2') ? array('placeholder' => 'Temporal 2', 'class' => 'form-control is-invalid') : array('placeholder' => 'Temporal 2', 'class' => 'form-control') ) }}
      @if ($errors->has('temporal_2'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('temporal_2') }}</strong>
        </div>
      @endif
    </div>
  </div> --}}
@endif

<div class="col-12">
  <div class="form-group">
    <button class="btn btn-primary float-right">
      Guardar y continuar
    </button>
  </div>
</div>

