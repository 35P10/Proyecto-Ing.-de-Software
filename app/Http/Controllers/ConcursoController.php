<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sesion;
use App\Models\Evento;
use App\Models\Concurso;
use App\Models\SesionEvento;

class ConcursoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_sesion)
    {
        // $sesion = sesion::first();
        return view('concurso.create', compact('id_sesion'));
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
        // dd($data_evento);
        $evento = Evento::create($data_evento);
        // dd($evento->id);
        $data_concurso = request()->only(['num_participantes', 'requisitos', 'ganadores', 'moderador']);
        $data_concurso['id_evento'] = $evento->id;
        $concurso = Concurso::create($data_concurso);
        // dd($concurso);
        $data_sesion_evento = ['id_sesion' => $id_sesion, 'id_evento' => $evento->id, 'hora_inicio' => request('hora_inicio')];
        SesionEvento::create($data_sesion_evento);

        return redirect()->route('sesion.mostrar', $id_sesion);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        return view('concurso.edit', compact('evento'));
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
        $evento->concurso->update(request()->only(['num_participantes', 'requisitos', 'ganadores', 'moderador']));
        $evento->sesionEvento->where('id_evento', $evento->id)->update(request()->only(['hora_inicio']));

        return redirect()->route('sesion.mostrar', $evento->sesionEvento->id_sesion);
    }
}
