<div class="col-md-12 col-12">
  <div class="form-group{{ $errors->has('body') ? ' has-danger' : '' }}">
    {{ Form::textarea('body', null, $attributes = $errors->has('body') ? array('placeholder' => 'Escriba el diagnostico', 'class' => 'form-control form-control-alternative   is-invalid', 'required') : array('placeholder' => 'Escriba el diagnostico', 'class' => 'form-control form-control-alternative  ', 'required') ) }}
    @if ($errors->has('body'))
      <div class="invalid-feedback">
          <strong>{{ $errors->first('body') }}</strong>
      </div>
    @endif
  </div>
</div>

<div class="col-12">
    <button class="btn btn-primary">
        Guardar
    </button>
</div>