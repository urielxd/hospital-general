<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('paciente')
                ->unsigned();
            $table->foreign('paciente')
                ->references('id')
                ->on('users');

            $table->integer('doctor')
                ->unsigned();
            $table->foreign('doctor')
                ->references('id')
                ->on('users');

            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('color')->nullable();
            $table->datetime('start')->nullable();
            $table->datetime('end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
