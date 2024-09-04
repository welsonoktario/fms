<?php

namespace App\Http\Controllers;

use App\Models\SparepartCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SparepartCategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sparepart_categories = DB::table('sparepart_categories')->get();
        return view('sparepart_categorie.index',compact('sparepart_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sparepart_categories = DB::table('sparepart_categories')->get();
        return view('sparepart_categorie.create',compact('sparepart_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sparepart_categories = SparepartCategory::create([
            'name' => $request->name,
        ]);
        return redirect()->route('sparepart_categories.index',compact('sparepart_categories'));
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
