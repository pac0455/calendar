<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessionLifetime = Config::get('session.lifetime');
        $lastActivity = Session::get('last_activity');

        // Calcula el tiempo restante en minutos
        $timeLeft = $sessionLifetime - (time() - $lastActivity) / 60;
        return view('calendar.index')->with('lifetime', $timeLeft);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Evento::create($request->except(['_token', '_method']));
        return redirect()->route('calendar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $eventos = Evento::all();
        $eventos_formateados = [];
        foreach ($eventos as $key => $value) {
            $eventos_formateados[] = [
                'title' =>  $value->titulo,
                'start' => $value->fechaHora_incio . ':00',
                'end' => $value->fechaHora_fin . ':00',
                'color' => $value->tipo_evento->fondo,
                'textColor' => $value->tipo_evento->texto,
                'borderColor' => $value->tipo_evento->border,
                'extendedProps' => [
                    'id' => $value->id,
                    'start' => $value->fechaHora_incio . ':00',
                    'end' => $value->fechaHora_fin . ':00',
                    'event_type' => $value->tipo_evento_id
                ]
            ];
        };

        return response()->json($eventos_formateados);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            Evento::findOrFail($id)->update($request->all());
            return response()->json([1,'Actualizado correctamente']);
        } catch (\Throwable $th) {
            return response()->json([0,$th]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
