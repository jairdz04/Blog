<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\models\noticia;
use Illuminate\Routing\Route;

class noticiasController extends Controller
{
    
    public function __construct(){

        $this->middleware('cors');
    }
    public function __construct(){
    $this->beforeFilter('@find', ['only'=> ['show', 'update', 'destroy']]);
    }

    public function find(Route $route){
        $this->noticia = noticia::find($route->getParameter('noticias'));
       // dd($route->getParameter('alumno'));
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $noticia = noticia::all();
        return response()-> json($noticia->toArray());
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
        noticia::create($request->all());
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
         return response()->json($this->noticia);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $this->historia->delete();
    return response()->json(["mensaje"=>"Eliminado correctamente"]);
    }
}
