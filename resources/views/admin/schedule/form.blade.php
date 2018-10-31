<div class="">
    {!! Form::hidden('user_id', $doctor->id) !!}
    <div id="app" class="col-12">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="">Dia y hora de empiezo</label>
                    <input-date name="start"></input-date>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="">Dia y hora de terminación</label>
                    <input-date name="end"></input-date>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <div class="input-group-alternative">
                        {{ Form::number('interval', null, ['class' => 'form-control form-control-alternativo', 'placeholder' => 'Tiempo aproximado en minutos por cita. Ej. 40', 'required' => true]) }}
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary">
                    Asignar horario
                </button>
            </div>
        </div>
    </div>
</div>