<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceType;
use Illuminate\Http\Request;

class MaintenanceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mts = MaintenanceType::all();

        return view('maintenance-type.index', compact('mts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('maintenance-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        MaintenanceType::create([
            'name' => $request->name,
            'duration_type' => $request->duration_type,
            'duration_value' => $request->duration_value,
        ]);

        return redirect()->route('maintenance-types.index')->with('success', 'Maintenance Type created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mt = MaintenanceType::findOrFail($id);

        return view('maintenance-type.edit', compact('mt'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mt = MaintenanceType::findOrFail($id);
        $mt->update([
            'name' => $request->name,
            'duration_type' => $request->duration_type,
            'duration_value' => $request->duration_value,
        ]);

        return redirect()->route('maintenance-types.index')->with('success', 'Maintenance Type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
