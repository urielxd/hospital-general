<?php

use Illuminate\Database\Seeder;
use App\Especialidad;
class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Especialidad::create([
          'name' => 'CIRUGÍA GENERAL'
        ]);
        Especialidad::create([
          'name' => 'TRAUMATOLOGÍA'
        ]);
        Especialidad::create([
          'name' => 'GINECO-OBSTETRICIA'
        ]);
        Especialidad::create([
          'name' => 'ODONTOLOGÍA'
        ]);
        Especialidad::create([
          'name' => 'MEDICINA INTERNA'
        ]);
        Especialidad::create([
          'name' => 'PSICOLOGÍA'
        ]);
        Especialidad::create([
          'name' => 'PSICOLOGÍA'
        ]);
        Especialidad::create([
          'name' => 'NUTRICIÓN'
        ]);
    }
}
