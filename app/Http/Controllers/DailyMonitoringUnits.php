<?php

namespace App\Http\Controllers;

use App\Models\DailyMonitoringUnit;
use App\Models\Driver;
use App\Models\Project;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DailymonitoringExport;

class DailyMonitoringUnits extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $project = $request->get('proyek', 'all');
        // $dailymonitoringunits = DailyMonitoringUnit::query('id', 'user_id','driver_id', 'unit_id','project_id','issue','conditions','status_unit')->when($project != 'all', function );
        // return view('dailymonitoringunit.index', compact('dailymonitoringunits','projects'));
        $project = $request->get('project', 'all');
        $dari = $request->get('dari');
        $ke = $request->get('ke');

        $query = DailyMonitoringUnit::query()
            ->with(['project'])
            ->when($project != 'all', function ($q) use ($project) {
                return $q->where('project_id', $project);
            });

        if ($dari && $ke) {
            $query = $query->whereBetween('created_at', [$dari, $ke]);
        }

        $query = $query->orderBy('created_at', 'DESC')
            ->orderBy('id', 'ASC');

        $dailymonitoringunits = $query->get();
        $projects = Project::all();

        return view('dailymonitoringunit.index', compact('dailymonitoringunits', 'projects'));
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
    public function cetak_excel(Request $request)
    {
        // $proyek = Proyek::all();
        $project = $request->get('project', 'all');
        // dd($proyek);
        $dari = $request->get('dari');
        // dd($dari);
        $ke = $request->get('ke');
        // $namaproyek = $proyek->nama;
        // $proyek::Proyek::find($id);
        // $proyeks = Proyek::all();
        $filename = 'dailymonitoring';

        if ($project != 'all') {
            $project = Project::find($project);
            $filename .= "_{$project->name}";
        }

        /* $lemburs = [];
        foreach ($absensis as $a) {
            $lemburs[] = Lembur::query()
                ->where('user_id', $a->user_id)
                ->where('tanggal', $a->tanggal_absensi)
                ->first();
        } */
        // return Excel::download(new DailyMonitoringUnit($project, $dari, $ke), "dailymonitoring_$project.xlsx");
        // return Excel::download(new DailymonitoringExport($project, $dari, $ke), "dailymonitoring_$project.xlsx");
        $xlsx = new DailymonitoringExport($project->id, $dari, $ke);

        return $xlsx->download("$filename.xlsx");
    }
}
