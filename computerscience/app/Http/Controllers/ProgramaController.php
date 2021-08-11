<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\programa;
use App\Models\sesion;
use App\Models\evento;
use Illuminate\Http\Request;

class ProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programa.create');
    }
    
    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        programa::create($request->all());
        return redirect()->route('home.index')
        ->with('success','Programa creado exitosamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function show($id_programa)
    {
        $programa = programa::where('id', $id_programa)->first();

        if (!$programa) {
            return redirect()->route('home.index');
        }

        $_id_programa = $programa -> id;

        $sesiones = sesion::where('id_programa', $_id_programa)->get();

        $columns = [];
        foreach($sesiones as $sesion) {
                $cronograma = DB::table('sesion_evento')
                    ->join('evento','evento.id','=','sesion_evento.id_evento')
                    ->select('evento.*')
                    ->where('sesion_evento.id_sesion',$sesion->id)
                    ->get();
                $columns[$sesion->id] = $cronograma;
            
        }

        $data =  array();
        $data['programa'] =  $programa;
        $data['sesion']  =  $sesiones;
        $data['columns'] = $columns; 
        return view('sesion.show', compact('data'));

    }
    /*public function show(programa $programa)
    {
        return view('sesion.show3', compact('programa'));

    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function edit($id_programa)
    {
        $programa = programa::where('id', $id_programa)->first();

        if (!$programa) {
            return redirect()->route('home.index');
        }

        $_id_programa = $programa -> id;
        $sesiones = sesion::where('id_programa', $_id_programa)->get();
        $rows = [];
        $columns = [];

        foreach($sesiones as $sesion) {
                $cronograma = DB::table('sesion_evento')
                    ->join('evento','evento.id','=','sesion_evento.id_evento')
                    ->select('evento.*')
                    ->where('sesion_evento.id_sesion',$sesion->id)
                    ->get();
                $columns[$sesion->id] = $cronograma;
            
        }

        $data =  array();
        $data['programa'] =  $programa;
        $data['sesion']  =  $sesiones;
        $data['columns'] = $columns; 
        return view('programa.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, programa $programa)
    {
        $programa -> update($request->all());

        return redirect()->route('programa.edit', $programa->id)
            ->with('success','Sesion actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\programa  $programa
     * @return \Illuminate\Http\Response
     */
    public function destroy(programa $programa)
    {
        $sesiones = sesion::where('id_programa', $programa->id)->get();

        foreach($sesiones as $sesion) {
            DB::table('sesion_evento')->where('id_sesion', '=', $sesion->id)->delete();
        }

        sesion::where('id_programa', $programa->id)->delete();

        $programa->delete();

        return redirect()->route('home.index')
        ->with('success','Programa eliminado exitosamente');
    }
}
