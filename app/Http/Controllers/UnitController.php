<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('apps.satuan.index', [
            'satuan_barang' => Unit::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apps.satuan.create', [
            'satuan_barang' => Unit::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'unit_id' => 'required|unique:units|max:255',
        ]);

        Unit::create($validatedData);

        return redirect('/apps/satuan')->with('success', 'New satuan barang has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        if (!auth()->user()) {
            abort(403);
        }

        return view('apps.satuan.edit', [
            'satuan_barang' => $unit
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        $rules = ['name' => 'required|max:255'];

        //Cek slug
        if ($request->unit_id != $unit->unit_id) {
            $rules['unit_id'] = 'required|unique:units|max:255';
        }

        $validatedData = $request->validate($rules);

        Unit::where('id', $unit->id)
            ->update($validatedData);

        return redirect('/apps/units')->with('success', 'Satuan barang has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        //
    }
}
