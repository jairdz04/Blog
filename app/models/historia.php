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
            $table->text('comentario_parcial');
            $table->string('fecha_comentario_parcial');
            $table->text('comentario_final');
            $table->string('fecha_comentario_final');
            $table->timestamps();
     *
     * @var array
     */
    protected $fillable = ['comentario_parcial', 'fecha_comentario_parcial', 'comentario_final','fecha_comentario_final'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
