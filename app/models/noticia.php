<?php namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class noticia extends Model {
   

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = '';

    /**
     * The attributes that are mass assignable.
      $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('identificacion')->unique();
            $table->string('sede');
            $table->string('email')->unique();
            $table->string('telefono')->unique();
            $table->string('fechaNacimiento');
            $table->timestamps();
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
