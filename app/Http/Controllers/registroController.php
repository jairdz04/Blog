<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\registro;
use Illuminate\Routing\Route;


class registroController extends Controller
{
    public function __construct(){

        $this->middleware('cors');
    }
    public function __construct(){
    $this->beforeFilter('@find', ['only'=> ['show', 'update', 'destroy']]);
    }

    public function find(Route $route){
        $this->registro = registro::find($route->getParameter('registro'));
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registro = registro::all();
        return response()-> json($registro->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         registro::create($request->all());
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
         return response()->json($this->registro);
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
      $this->registro->fill($request->all());
        $this->registro->save();
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
         $this->registro->delete();
    return response()->json(["mensaje"=>"Eliminado correctamente"]);
    }
}
