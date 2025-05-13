<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feria;
use App\Models\Emprendedor;

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

    public function gestionar()
    {
    $ferias = Feria::with('emprendedores')->get(); // eager loading
    return view('ferias.gestionar', compact('ferias'));
    }

    public function asignar(Feria $feria)
    {
    $todos = Emprendedor::all();
    $asignados = $feria->emprendedores->pluck('id')->toArray();
    
    return view('ferias.asignar', compact('feria', 'todos', 'asignados'));
    }

    public function vincularEmprendedor(Request $request, Feria $feria)
{
    $request->validate([
        'emprendedor_id' => 'required|exists:emprendedores,id'
    ]);

    $fecha = $feria->fecha_evento;

    $yaAsignado = Feria::whereDate('fecha_evento', $fecha)
        ->whereHas('emprendedores', function ($query) use ($request) {
            $query->where('emprendedor_id', $request->emprendedor_id);
        })
        ->where('id', '!=', $feria->id)
        ->exists();

    if ($yaAsignado) {
        return redirect()->back()->withErrors([
            'emprendedor_id' => 'Este emprendedor ya está asignado a otra feria en la misma fecha.'
        ]);
    }

    $feria->emprendedores()->attach($request->emprendedor_id);

    return redirect()->back()->with('success', 'Emprendedor asignado con éxito.');
}

public function desvincularEmprendedor(Feria $feria, $emprendedor_id)
    {
    $feria->emprendedores()->detach($emprendedor_id);

    return redirect()->back()->with('success', 'Emprendedor eliminado de la feria.');
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
