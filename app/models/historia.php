<?php namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class historia extends Model {
   

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'historia';

    /**
     * The attributes that are mass assignable.
      $table->increments('id');
            $table->text('ComentarioParcial');
            $table->string('fechaComentarioParcial');
            $table->text('comentarioFinal');
            $table->string('fechaComentarioFinal');
            $table->integer('idRegistro');
            $table->integer('idAlumno');
            $table->timestamps();
     *
     * @var array
     */
    protected $fillable = ['ComentarioParcial', 'fechaComentarioParcial', 'comentarioFinal','fechaComentarioFinal', 'idRegistro' , 'idAlumno'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
