<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historia', function (Blueprint $table) {
            $table->increments('id');
            $table->text('ComentarioParcial');
            $table->string('fechaComentarioParcial');
            $table->text('comentarioFinal');
            $table->string('fechaComentarioFinal');
            $table->integer('idRegistro');
            $table->integer('idAlumno');
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
        Schemas::create('historia');
    }
}
