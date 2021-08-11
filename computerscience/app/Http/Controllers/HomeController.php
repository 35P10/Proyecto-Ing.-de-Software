<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\home;
use App\Models\programa;
use App\Models\Ponente;
use App\Models\sesion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $_edicion = programa::all();
        $ultima_edicion = DB::table('programa')
            ->orderBy('anio_edicion','desc')
            ->first();
        
        $programa = programa::where('anio_edicion', $ultima_edicion->anio_edicion)->first();

        if (!$programa) {
            return redirect()->route('home.index');
        }
    
        $id_programa = $programa -> id;
        $sesiones = sesion::where('id_programa', $id_programa)->get();
        $columns = [];
    
        foreach($sesiones as $sesion) {
            $cronograma = DB::table('sesion_evento')
                ->join('evento','evento.id','=','sesion_evento.id_evento')
                ->select('evento.*','sesion_evento.hora_inicio')
                ->where('sesion_evento.id_sesion',$sesion->id)
                ->get();
            $columns[$sesion->id] = $cronograma;    
        }
    
        $data =  array();
        $data['programa'] =  $programa;
        $data['sesion']  =  $sesiones;
        $data['columns'] = $columns; 

        ///


        $ponentes = Ponente::select(['dni', 'nombre', 'especialidad', 'grado_academico'])->get();
        $data['edicion'] =  $_edicion;
        // $data['ponentes'] =  $ponentes;
        
        return view('home.index',compact('data', 'ponentes'));
        // return view('evento.show',compact('data', 'ponentes'));

   // return view('home.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('welcome');
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
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Models\evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function buscar()
    {
        return view('home.buscar');
    }

       /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('home.login');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\home  $home
     * @return \Illuminate\Http\Response
     */
    public function show(home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\home  $home
     * @return \Illuminate\Http\Response
     */
    public function edit(home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\home  $home
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\home  $home
     * @return \Illuminate\Http\Response
     */
    public function destroy(home $home)
    {
        //
    }
}
