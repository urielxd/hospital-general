<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')
                ->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->string('nombre');
            $table->string('apellido');
            $table->string('fecha_nacimiento');
            $table->string('curp');
            $table->timestamps();
            // Pacientes
            $table->string('entidad_nacimiento')->nullable();
            $table->string('clave_de_edad')->nullable();
            $table->string('sexo')->nullable();
            $table->string('indigena')->nullable();
            $table->string('derechohabiencia')->nullable();
            $table->string('peso')->nullable();
            $table->string('talla')->nullable();
            $table->string('migrante')->nullable();
            $table->string('discapacidad')->nullable();
            $table->string('relacion')->nullable();
            $table->string('temporal')->nullable();
            $table->string('temporal_2')->nullable();
            // Doctor
            $table->string('cedula_profesional')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
