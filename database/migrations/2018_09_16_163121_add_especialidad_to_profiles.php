<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEspecialidadToProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function($table) {
            $table->integer('especialidad_id')
                ->unsigned()->nullable();
            $table->foreign('especialidad_id')
                ->references('id')
                ->on('especialidads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function($table) {
            $table->dropColumn('especialidad_id');
        });
    }
}
