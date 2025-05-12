<?php

namespace App\Http\Controllers;

use App\Models\Feria;
use App\Models\Emprendedor;
use Illuminate\Http\Request;

class FeriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ferias = Feria::orderBy('fecha_evento', 'desc')->get();
        return view('ferias.index', compact('ferias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Para UC3: enviamos lista de emprendedores disponibles
        $emprendedores = Emprendedor::all();
        return view('ferias.create', compact('emprendedores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación RF: campos obligatorios y formatos
        $validated = $request->validate([
            'nombre'         => 'required|string|max:255',
            'fecha_evento'   => 'required|date|after_or_equal:today',
            'lugar'          => 'required|string|max:255',
            'descripcion'    => 'required|string|max:1000',
            'emprendedores'  => 'array',
            'emprendedores.*'=> 'exists:emprendedores,id',
        ], [
            'fecha_evento.after_or_equal' => 'La fecha no puede ser anterior a hoy.',
        ]);

        // Crear feria
        $feria = Feria::create($validated);

        // UC3: vincular emprendedores seleccionados (si los hay)
        if (!empty($validated['emprendedores'])) {
            $feria->emprendedores()->attach($validated['emprendedores']);
        }

        return redirect()
            ->route('ferias.index')
            ->with('success', 'Feria registrada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feria $feria)
    {
        // UC4: pasar lista de emprendedores vinculados
        $participantes = $feria->emprendedores;
        return view('ferias.show', compact('feria', 'participantes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feria $feria)
    {
        // Para editar vínculos: lista completa + seleccionados
        $emprendedores       = Emprendedor::all();
        $seleccionados       = $feria->emprendedores->pluck('id')->toArray();

        return view('ferias.edit', compact('feria', 'emprendedores', 'seleccionados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feria $feria)
    {
        // Validación similar a store
        $validated = $request->validate([
            'nombre'         => 'required|string|max:255',
            'fecha_evento'   => 'required|date|after_or_equal:today',
            'lugar'          => 'required|string|max:255',
            'descripcion'    => 'required|string|max:1000',
            'emprendedores'  => 'array',
            'emprendedores.*'=> 'exists:emprendedores,id',
        ]);

        // Actualizar datos de la feria
        $feria->update($validated);

        // UC3: sincronizar vínculos (añade y quita según selección)
        $feria->emprendedores()->sync($validated['emprendedores'] ?? []);

        return redirect()
            ->route('ferias.index')
            ->with('success', 'Feria actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feria $feria)
    {
        // Al eliminar, también se quitan registros en la pivote por cascada defini­
        // da en la migración/relación, o bien:
        // $feria->emprendedores()->detach();
        $feria->delete();

        return redirect()
            ->route('ferias.index')
            ->with('success', 'Feria eliminada.');
    }
}
