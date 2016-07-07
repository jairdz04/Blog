<?php namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class registro extends Model {
   

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'docentes';

    /**
     * The attributes that are mass assignable.
        $table->increments('id');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('identificacion')->unique();
            $table->string('sede');
            $table->string('email')->unique();
            $table->string('telefono')->unique();
            $table->string('fecha_nacimiento');
            $table->timestamps();
     *
     * @var array
     */
    protected $fillable = ['nombres', 'apellidos', 'identificacion','sede', 'email' , 'telefono', 'fecha_nacimiento'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
