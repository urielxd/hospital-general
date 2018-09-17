<?php

use Illuminate\Database\Seeder;
use App\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profile::create([
          'nombre' => 'Dr. Eduardo Ejemplo',
          'apellido' => 'Glz',
          'fecha_nacimiento' => '09/09/1985',
          'curp' => '12345678912345678',
          'user_id' => '2',
          'especialidad_id' => '4',
          'cedula_profesional' => 'CEDFRT5556TTG'
        ]);

        Profile::create([
          'nombre' => 'Dra. Maria Ejemplo',
          'apellido' => 'Jimenez',
          'fecha_nacimiento' => '09/09/1985',
          'curp' => '12345678912345678',
          'user_id' => '3',
          'especialidad_id' => '1',
          'cedula_profesional' => 'CEDFRT5556TTG'
        ]);
    }
}
