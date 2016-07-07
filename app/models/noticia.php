<?php namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class noticia extends Model {
   

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'noticia';

    /**
     * The attributes that are mass assignable.
      $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('telefono');
            $table->string('email');
            $table->string('mensaje');
            $table->timestamps();
     *
     * @var array
     */
    protected $fillable = ['nombre', 'apellido', 'email', 'telefono', 'mensaje'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
