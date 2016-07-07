<?php namespace App\Models;


use Illuminate\Database\Eloquent\Model;



class alumno extends Model {
   

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'alumno';

    /**
     * The attributes that are mass assignable.
      $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('identificación');
            $table->string('fecha_nacimiento');
            $table->string('grado');
            $table->string('curso');
            $table->string('director_grupo');
            $table->string('numero_contacto');
            $table->timestamps();
     *
     * @var array
     */
    protected $fillable = ['nombre', 'apellido', 'identificacion','fecha_nacimiento', 'grado' , 'curso', 'director_grupo', 'numero_contacto'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
