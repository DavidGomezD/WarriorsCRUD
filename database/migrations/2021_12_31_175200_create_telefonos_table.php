<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelefonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefonos', function (Blueprint $table) {
            //David: Estructura de la tabla telefonos en snake_case
            $table->bigIncrements('id');
            //David:unsigned es para que solo sea positivo 
            $table->unsignedBigInteger('telefono')
                ->unique(); //No se puede repetir, relacion 1 a 1
            //Davi:llave foranea
            $table->unsignedBigInteger('estudiante_id')
                ->unique(); //No se puede repetir, relacion 1 a 1
            $table->timestamps();

            //David:llave foranea
            $table->foreign('estudiante_id')
                ->references('id')
                ->on('estudiantes')
                ->onDelete('cascade'); //Si borramos al estudiante se borra su telefono
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telefonos');
    }
}
