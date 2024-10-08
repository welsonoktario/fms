<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spareparts = DB::table('spareparts')->get();
        $sparepart_categories = DB::table('sparepart_categories')->get();
        $sparepart_brands = DB::table('sparepart_brands')->get();
        return view('sparepart.index', compact('spareparts', 'sparepart_categories', 'sparepart_brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $spareparts = DB::table('spareparts')->get();
        $sparepart_categories = DB::table('sparepart_categories')->get();
        return view('sparepart.create', compact('spareparts','sparepart_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $spareparts = Sparepart::create([
            'name' => $request->name,
            'sparepart_categorie' => $request->sparepart_categorie,
            'sparepart_brand' => $request->sparepart_brand,
        ]);
        return redirect()->route('spareparts.index', compact('spareparts'));
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
