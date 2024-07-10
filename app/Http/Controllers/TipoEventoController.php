<?php

namespace App\Http\Controllers;

use App\Models\TipoEvento;
use Illuminate\Http\Request;

class TipoEventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tipo_evento.index')->with('tipos_eventos' , TipoEvento::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipo_evento.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'fondo' => 'required|string|max:255',
            'border' => 'required|string|max:255',
            'texto' => 'required|string|max:255',
        ]);
        TipoEvento::create($request->except(['_token', '_method']));
        return redirect()->route('tipo_evento.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(TipoEvento::all());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('tipo_evento.edit')->with('tipo_evento' , TipoEvento::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'fondo' => 'required|string|max:255',
            'border' => 'required|string|max:255',
            'texto' => 'required|string|max:255',
        ]);
        $check = TipoEvento::findOrFail($id)->update($request->except(['_token', '_method']));
        return response()->json($check);
        /*return redirect()->route('tipo_evento.index'); */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        TipoEvento::destroy($id);
        return redirect()->route('tipo_evento.index');
    }
}
