<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\programa;
use App\Models\sesion;
use App\Models\evento;
use Illuminate\Http\Request;

class SesionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fecha_actual= date("Y-m-d h:i:s a");
        $programas = programa::where('fecha_fin','>',$fecha_actual)->get();
        return view('sesion.create', compact('programas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        sesion::create($request->all());
        $programa = programa::where('id',$request->input('id_programa'))->first();
        return redirect()->route('programa.show',$programa->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function show(sesion $sesion)
    {
        return view('evento.show', compact('sesion'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function edit($sesion)
    {
        $sesion = sesion::where('id', $sesion)->first();
        error_log($sesion);
        $evento = DB::table('sesion_evento')
        ->join('evento','evento.id','=','sesion_evento.id_evento')
        ->select('evento.*','sesion_evento.hora_inicio')
        ->where('sesion_evento.id_sesion',$sesion->id)
        ->get();
        $anio_edicion = programa::where('id',$sesion->id_programa)->first();
        error_log($anio_edicion);
        $all_eventos = evento::all();

        $data =  array();
        $data['sesion'] =  $sesion;
        $data['evento'] =  $evento;
        $data['all_eventos'] =  $all_eventos;
        $data['anio_edicion'] =  $anio_edicion->anio_edicion;

        return view('sesion.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sesion $sesion)
    {
        $sesion -> update($request->all());

        return redirect()->route('programa.show', $sesion->id_programa)
            ->with('success','Sesion actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sesion  $sesion
     * @return \Illuminate\Http\Response
     */
    public function destroy(sesion $sesion)
    {
        DB::table('sesion_evento')->where('id_sesion', '=', $sesion->id)->delete();
        sesion::where('id', $sesion->id)->delete();

        return redirect()->route('programa.show', $sesion->id_programa)
            ->with('success','Sesion eliminado exitosamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function quitar_evento(Request $request)
    {
        DB::table('sesion_evento')->where('id_evento',$request->input('id_evento'))
                                    ->where('id_sesion',$request->input('id_sesion'))
                                    ->delete();

        return redirect()->route('sesion.show',$request->input('id_sesion'))
        ->with('success','Evento removido correctamente');
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cambiar_hora_evento(Request $request)
    {
        $request->validate([
            'hora_inicio' => 'required',
            'id_evento' => 'required',
            'id_sesion' => 'required',
        ]);

        DB::table('sesion_evento')
            ->where('id_evento',$request->input('id_evento'))
            ->where('id_sesion',$request->input('id_sesion'))
            ->update(['hora_inicio' =>$request->input('hora_inicio')]);

        error_log($request->input('hora_inicio'));

        return redirect()->route('sesion.edit',$request->input('id_sesion'))
        ->with('success','Hora de evento actualizado correctamente');

    }


}
