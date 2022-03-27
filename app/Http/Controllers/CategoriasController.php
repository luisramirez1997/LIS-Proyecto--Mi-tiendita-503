<?php

namespace App\Http\Controllers;

use App\Categorias;
use App\Productos;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $data['empleados']=Categorias::paginate(5);

        return view('categorias.index',$data);
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
        
            $categoria           = new Categorias();
            $categoria->name     = $request->nombre;
            $categoria->descripcion  = $request->descripcion;
            $categoria->save();
            return redirect('categoria');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
     public function show(Categorias $categorias)
    {
       //
    } 

    public function save(Request $request)
    {

            $producuto           = new Productos();
            $producuto->name     = $request->nombre;
            $producuto->precio  = $request->precio;
            $producuto->descripcion  = $request->descripcion;
            $producuto->stock  = $request->stock;
            $producuto->id_categoria  = $request->categoria;
            $producuto->save();

            return redirect('home');

    } 

    public function delete(Productos $producto){
    
        $producto->delete();
        $request->session()->flash('alert-success', 'La contraseña se ha cambiado exitosamente, cierra sesión e ingresa nuevamente');

        return response()->json(['type'=>'success','title'=> 'Registro Eliminado Exitosamente'], 200);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorias $categorias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorias $categorias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorias $categorias)
    {
        //
    }
}
