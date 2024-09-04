<?php

namespace App\Http\Controllers;

use App\Models\SparepartBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SparepartBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sparepart_brands = DB::table('sparepart_brands')->get();
        return view('sparepart_brand.index',compact('sparepart_brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sparepart_brands = DB::table('sparepart_brands')->get();
        return view('sparepart_brand.create',compact('sparepart_brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sparepart_brands = SparepartBrand::create([
            'name' => $request->name,
        ]);
        return redirect()->route('sparepart_brands.index',compact('sparepart_brands'));
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
