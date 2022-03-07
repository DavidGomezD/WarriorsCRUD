<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            //David: Estructura de la tabla grupos
            $table->bigIncrements('id');
            $table->String('grupo');
            $table->unsignedBigInteger('turno_id'); //Relacion N:1
            $table->unsignedBigInteger('semestre_id'); // Relacion N:1
            $table->timestamps();
            
            //David:llave foranea turno_id
            $table->foreign('turno_id')
            ->references('id')
            ->on('turnos')
            ->onDelete('cascade');
            
            //David:llave foranea semestre_id
            $table->foreign('semestre_id')
            ->references('id')
            ->on('semestres')
            ->onDelete('cascade');
            });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos');
    }
}
