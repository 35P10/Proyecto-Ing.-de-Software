<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Ponencia;
use App\Models\SesionEvento;
use App\Models\Ponente;
use App\Models\EventoPonente;

class PonenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
    public function create($id_sesion)
    {
        $ponentes = Ponente::all();
        return view('ponencia.create', compact('id_sesion', 'ponentes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id_sesion)
    {
        

        $data_evento = request()->only(['tema', 'descripcion']);
        $data_evento ['dni_administrador'] = '72745480';
        $evento = Evento::create($data_evento);

        // dd($evento->id);
        $data_ponencia = request()->only(['arch_presentacion']);
        $data_ponencia['id_evento'] = $evento->id;
        Ponencia::create($data_ponencia);

        $data_sesion_evento = ['id_sesion' => $id_sesion, 'id_evento' => $evento->id, 'hora_inicio' => request('hora_inicio')];
        SesionEvento::create($data_sesion_evento);

        $data_evento_ponente = ['dni_ponente' => request('ponente') , 'id_ponencia' => $evento->id];
        EventoPonente::create($data_evento_ponente);

        return redirect()->route('sesion.mostrar', $id_sesion);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        $ponentes = Ponente::all();
        return view('ponencia.edit', compact('evento', 'ponentes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Evento $evento)
    {
        $evento->update(request()->only(['tema', 'descripcion']));
        $evento->ponencia->update(request()->only(['arch_presentacion']));
        $evento->sesionEvento->where('id_evento', $evento->id)->update(request()->only(['hora_inicio']));
        $evento->ponencia->eventoPonente[0]->update(['dni_ponente' => request('ponente')]);

        return redirect()->route('sesion.mostrar', $evento->sesionEvento->id_sesion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
