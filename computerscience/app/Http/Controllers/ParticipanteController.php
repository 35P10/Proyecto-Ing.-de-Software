<?php

namespace App\Http\Controllers;

use App\Models\participante;
use App\Models\persona;
use Illuminate\Http\Request;

class ParticipanteController extends Controller
{
    public function __constructor()
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
    public function create()
    {
        return view('participante.registro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'dni' => 'required',
            'nombre' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        persona::create($request->all());
        $dni_persona= $request->input('dni');
        $universidad= $request->input('universidad');
        $grado= $request->input('grado');
        participante::create(['dni_persona' => $dni_persona,
                            'universidad' => $universidad,
                            'grado' => $grado]);
        return redirect()->route('home.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\participante  $participante
     * @return \Illuminate\Http\Response
     */
    public function show(participante $participante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\participante  $participante
     * @return \Illuminate\Http\Response
     */
    public function edit(participante $participante)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\participante  $participante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, participante $participante)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\participante  $participante
     * @return \Illuminate\Http\Response
     */
    public function destroy(participante $participante)
    {
        //
    }
}
