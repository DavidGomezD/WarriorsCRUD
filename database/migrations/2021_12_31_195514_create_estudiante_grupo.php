<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudianteGrupo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante_grupo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('estudiante_id');
            $table->unsignedBigInteger('grupo_id');
            $table->timestamps();
            //Llaves foraneas de las tablas estudiantes y grupos
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')
            ->onDelete('cascade');
            $table->foreign('grupo_id')->references('id')->on('grupos')
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
        Schema::dropIfExists('estudiante_grupo');
    }
}
