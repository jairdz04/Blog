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
            $table->string('fechaNacimiento');
            $table->string('grado');
            $table->string('curso');
            $table->string('DirectorGrupo');
            $table->string('NúmeroContacto');
            $table->timestamps();
     *
     * @var array
     */
    protected $fillable = ['nombre', 'apellido', 'identificación','fechaNacimiento', 'grado' , 'curso', 'DirectorGrupo', 'NúmeroContacto'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
