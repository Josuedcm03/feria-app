<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprendedor;


class EmprendedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emprendedores = Emprendedor::all();
        return view('emprendedores.index', compact('emprendedores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ferias = \App\Models\Feria::all(); // Obtiene todas las ferias
    return view('emprendedores.create', compact('ferias'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $validated = $request->validate([
        'nombre'   => 'required|string|max:255',
        'telefono' => 'required|numeric',
        'rubro'    => 'required|string|max:255',
        'ferias'   => 'array',
        'ferias.*' => 'exists:ferias,id',
    ]);

    // Verificar si hay ferias seleccionadas con fechas repetidas
    if ($request->filled('ferias')) {
        $feriasSeleccionadas = \App\Models\Feria::whereIn('id', $request->ferias)->get();
        $fechas = [];

        foreach ($feriasSeleccionadas as $feria) {
            $fecha = $feria->fecha_evento;
            if (in_array($fecha, $fechas)) {
                return back()->withErrors([
                    'ferias' => 'No puedes seleccionar ferias que se celebren el mismo día.'
                ])->withInput();
            }
            $fechas[] = $fecha;
        }
    }

    // Crear el emprendedor
    $emprendedor = Emprendedor::create($validated);

    // Vincular las ferias seleccionadas
    if (!empty($validated['ferias'])) {
        $emprendedor->ferias()->attach($validated['ferias']);
    }

    return redirect()
        ->route('emprendedores.index')
        ->with('success', 'Emprendedor creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Emprendedor $emprendedor)
    {
        return view('emprendedores.show', compact('emprendedor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emprendedor $emprendedor)
    {
        return view('emprendedores.edit', compact('emprendedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Emprendedor $emprendedor)
    {
        $emprendedor->update($request->all());
        return redirect()->route('emprendedores.index')->with('success', 'Emprendedor actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emprendedor $emprendedor)
    {
        $emprendedor->delete();
        return redirect()->route('emprendedores.index')->with('success', 'Emprendedor eliminado.');
    }
}