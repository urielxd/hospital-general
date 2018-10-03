<div class="col-md-12 col-12">
  <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
    {{ Form::text('name', null, $attributes = $errors->has('name') ? array('placeholder' => 'Nombre de la especialidad', 'class' => 'form-control form-control-alternative   is-invalid', 'required') : array('placeholder' => 'Nombre de la especialidad', 'class' => 'form-control form-control-alternative  ', 'required') ) }}
    @if ($errors->has('name'))
      <div class="invalid-feedback">
          <strong>{{ $errors->first('name') }}</strong>
      </div>
    @endif
  </div>
</div>
