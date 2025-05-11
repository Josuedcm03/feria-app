<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        Feria::create($request->all());
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
        $feria->update($request->all());
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
