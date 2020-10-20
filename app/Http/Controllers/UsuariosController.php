<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['usuarios']=Usuarios::paginate(5);

        return view('usuarios.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('usuarios.alta');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $datosUsuario = request()->all();

        $datosUsuario = request()->except('_token','alta');
        // $datosUsuario = request()->except('alta');

        Usuarios::insert($datosUsuario);

        return redirect('usuarios')->with('Mensaje','Usuario Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(usuarios $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuario = Usuarios::findOrFail($id);

        return view('usuarios.editar',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosUsuario = request()->except(['_token','_method','edita']);

        Usuarios::where('id','=',$id)->update($datosUsuario);

        // $usuario = Usuarios::findOrFail($id);
        // return view('usuarios.editar',compact('usuario'));

        return redirect('usuarios')->with('Mensaje','Usuario Editado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function destroy($Id)
    {
        //
        $IdUsuario = $Id;
        Usuarios::destroy($IdUsuario);

        // return redirect('usuarios');
        return redirect('usuarios')->with('Mensaje','Usuario Eliminado');
    }
}
