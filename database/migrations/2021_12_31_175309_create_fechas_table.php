<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFechasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fechas', function (Blueprint $table) {
            //David: Estructura de la tabla fechas en snake_case
            $table->bigIncrements('id');
            $table->date('fecha_nacimiento');
            $table->unsignedBigInteger('estudiante_id')
                ->unique(); //No se puede repetir, relacion 1 a 1
            $table->timestamps();
            //David:llave foranea
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fechas');
    }
}
