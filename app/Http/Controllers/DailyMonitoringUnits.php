<?php

namespace App\Http\Controllers;

use App\Models\DailyMonitoringUnit;
use App\Models\Driver;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;

class DailyMonitoringUnits extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $dailymonitoringunits = DailyMonitoringUnit::all();
        // $units = Unit::all();
        // $drivers = Driver::all();
        // $users = User::all();
        // return view('dailymonitoringunit.index',compact('dailymonitoringunits','units','users','drivers'));
        $dailymonitoringunits = DailyMonitoringUnit::select('id', 'user_id', 'driver_id', 'unit_id')->get();
        return view('dailymonitoringunit.index', compact('dailymonitoringunits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
