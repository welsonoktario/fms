<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Project::create([
        //     'name' => $request->name,
        //     'timezone' => $request->timezone,
        // ]);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'timezone' => 'required|in:WIB,WIT,WITA',
        ]);
        try {
            // Create a new driver record
            Project::create([
                'name' => $validated['name'],
                'timezone' => $validated['timezone'],
            ]);

            return redirect()->route('projects.index')->with('success', 'Project created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('projects.index')->with('error', 'An error occurred: ' . $e->getMessage());
        }
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
