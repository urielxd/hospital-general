<div class="col-md-12 col-12">
  <div class="form-group{{ $errors->has('doctor') ? ' has-danger' : '' }}">
    {{ Form::select('doctor', $doctores, null, $attributes = $errors->has('doctor') ? array('placeholder' => 'Selecciona el doctor', 'class' => 'form-control is-invalid', 'required') : array('placeholder' => 'Selecciona el doctor', 'class' => 'form-control', 'required') ) }}
    @if ($errors->has('doctor'))
      <div class="invalid-feedback">
          <strong>{{ $errors->first('doctor') }}</strong>
      </div>
    @endif
  </div>
</div>
<div class="col-md-12 col-12">
  <div class="form-group{{ $errors->has('start') ? ' has-danger' : '' }}">
    <div class="input-group date" >
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
      </div>
      {{ Form::text('start', null, $attributes = $errors->has('start') ? array('placeholder' => 'Día y hora', 'class' => 'form-control   is-invalid',  'id' => 'datepicker', 'required') : array('placeholder' => 'Día y hora', 'class' => 'form-control  ',  'id' => 'datepicker', 'required') ) }}
    </div>
    @if ($errors->has('start'))
      <div class="invalid-feedback">
          <strong>{{ $errors->first('start') }}</strong>
      </div>
    @endif
  </div>
</div>
<div class="col-md-6 col-12">
  <div class="form-group">
    <button class="btn btn-primary">
      Agendar
    </button>
  </div>
</div>

