<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {

            $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('identificacion')->unique();
            $table->string('sede');
            $table->string('email')->unique();
            $table->string('telefono')->unique();
            $table->string('fechaNacimiento');
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
        Schema::create('docentes');
    }
}
