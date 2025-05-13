<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feria;

class FeriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ferias = Feria::all();
        return view('ferias.index', compact('ferias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ferias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_evento' => 'required|date|after_or_equal:today',
            'lugar' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
        ], [
            'nombre.required' => 'El campo Nombre es requerido.',
            'fecha_evento.required' => 'La Fecha del evento es requerida.',
            'fecha_evento.date' => 'La Fecha debe ser válida.',
            'fecha_evento.after_or_equal' => 'La Fecha no puede ser anterior a hoy.',
            'lugar.required' => 'El campo Lugar es requerido.',
            'descripcion.required' => 'El campo Descripción es requerido.',
        ]);
        
        Feria::create($validated);
        
        return redirect()->route('ferias.index')->with('success', 'Feria registrada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feria $feria)
    {
        return view('ferias.show', compact('feria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feria $feria)
    {
        return view('ferias.edit', compact('feria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feria $feria)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_evento' => 'required|date|after_or_equal:today',
            'lugar' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
        ], [
            'nombre.required' => 'El campo Nombre es requerido.',
            'fecha_evento.required' => 'La Fecha del evento es requerida.',
            'fecha_evento.date' => 'La Fecha debe ser válida.',
            'fecha_evento.after_or_equal' => 'La Fecha no puede ser anterior a hoy.',
            'lugar.required' => 'El campo Lugar es requerido.',
            'descripcion.required' => 'El campo Descripción es requerido.',
        ]);

        $feria->update($validated);

        return redirect()->route('ferias.index')->with('success', 'Feria actualizada correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feria $feria)
    {
        $feria->delete();
        return redirect()->route('ferias.index')->with('success', 'Feria eliminada.');
    }
}
