<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['nombre','apellido','fecha_nacimiento','curp','entidad_nacimiento','clave_de_edad','sexo','indigena','derechohabiencia','peso','talla','migrante','discapacidad','relacion','temporal','temporal_2','cedula_profesional', 'especialidad_id'
    ];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }
    public function especialidad ()
    {
        return $this->belongsTo(Especialidad::class);
    }
}
