<?php

namespace App\Http\Controllers;

use App\Models\Ponente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PonenteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ponentes = Ponente::all();
        return view('ponente.delete', compact('ponentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ponente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['dni_administrador' => '72745480']); //add request

        //dd($data);
        $ponente = Ponente::create($request->all());

        return view('ponente.show', compact('ponente'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ponente  $ponente
     * @return \Illuminate\Http\Response
     */
    public function show(Ponente $ponente)
    {
        return view('ponente.show', compact('ponente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ponente  $ponente
     * @return \Illuminate\Http\Response
     */
    public function edit(Ponente $ponente)
    {
        return view('ponente.edit', compact('ponente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ponente  $ponente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ponente $ponente)
    {
        $ponente->update($request->all());
        return view('ponente.show', compact('ponente'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ponente  $ponente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ponente $ponente)
    {
        // Desenlazando ponente de las ponencias
        $ponente->delete();
        return redirect()->route('home.index');
    }
}
