<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\historia;
use Illuminate\Routing\Route;

class historiaController extends Controller
{
     
    
    public function __construct(){
    $this->beforeFilter('@find', ['only'=> ['show', 'update', 'destroy']]);
    }

    public function find(Route $route){
     
        $this->historia = historia::find($route->getParameter('historias'));
     //dd($route->getParameter('historias'));

     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $historia = historia::all();
        return response()-> json($historia->toArray());
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
         historia::create($request->all());
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
       return response()->json($this->historia);
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
       $this->historia->fill($request->all());
        $this->historia->save();
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
       // dd($this->historia);
        $this->historia->delete();
    return response()->json(["mensaje"=>"Eliminado correctamente"]);
    }
}
