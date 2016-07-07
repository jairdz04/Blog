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
            $table->text('comentario_parcial');
            $table->string('fecha_comentario_parcial');
            $table->text('comentario_final');
            $table->string('fecha_comentario_final');
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
