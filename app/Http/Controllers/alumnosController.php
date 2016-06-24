<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\alumno;
use Illuminate\Routing\Route;

class alumnosController extends Controller
{

    public function __construct(){

        $this->middleware('cors');
    }

   // public function __construct(){
    //$this->beforeFilter('@find', ['only'=> ['show', 'update', 'destroy']]);
    //}

    public function find(Route $route){
        $this->alumno = alumno::find($route->getParameter('alumno'));
       // dd($route->getParameter('alumno'));
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $alumno = alumno::all();
        return response()-> json($alumno->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        alumno::create($request->all());
        return response()->json(["mensaje"=>"creada correctamente"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->alumno);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->alumno->fill($request->all());
        $this->alumno->save();
        return response()->json(["mensaje"=>"actualizado correctamente"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $this->alumno->delete();
    return response()->json(["mensaje"=>"Eliminado correctamente"]);
    }
}
