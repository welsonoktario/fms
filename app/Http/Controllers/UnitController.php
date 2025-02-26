<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Project;
use App\Models\Unit;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $project = $request->get('project', 'all');
        $units = Unit::query()
        ->when($project != 'all', function ($q) use ($project) {
            return $q->where('project_id', $project);
        })
        ->with(['project'])
        ->get();
        $projects = Project::all();
        $users = User::all();
        return view('units.index', compact('units', 'projects', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = Unit::all();
        $projects = Project::all();
        $users = User::all();
        return view('units.create', compact('units', 'projects', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'asset_code' => 'required|string|max:255|unique:units,asset_code',
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
            'year' => 'required|string|max:255',
            'plate' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'meter' => 'required|string|max:255',
            'colour' => 'required|string|max:255',
            'type' => 'required|string|in:DUMPTRUCK,HEAVY EQUIPMENT,OPERATIONAL CAR',
            'chassis_number' => 'required|string|max:255',
            'engine_number' => 'required|string|max:255',
            'engine_model' => 'required|string|max:255',
            'engine_type' => 'required|string|max:255',
            'tire_size_front' => 'required|string|max:255',
            'tire_size_rear' => 'required|string|max:255',
            'tire_pressure_front' => 'required|string|max:255',
            'tire_pressure_rear' => 'required|string|max:255',
            'unit_tax_duedate' => 'required|date',
            'image_unit' => 'required|image|max:2048',
            'description' => 'required|string|max:10000',
            'status' => 'required|string|in:READY,NOT READY',
        ]);
        if ($request->hasFile('image_unit')) {
            $file = $request->file('image_unit');
            $extension = $file->getClientOriginalExtension();
            $asset_code = $request->input('asset_code');
            $filename = $asset_code . '.' . $extension;
            $filePath = $file->storeAs('img/units', $filename, 'public');
            $validated['image_unit'] = $filePath;
        }


        $units = Unit::create([
            'asset_code' => $validated['asset_code'],
            'project_id' => $validated['project_id'],
            'user_id' => $validated['user_id'],
            'year' => $validated['year'],
            'plate' => $validated['plate'],
            'name' => $validated['name'],
            'meter' => $validated['meter'],
            'colour' => $validated['colour'],
            'type' => $validated['type'],
            'chassis_number' => $validated['chassis_number'],
            'engine_number' => $validated['engine_number'],
            'engine_model' => $validated['engine_model'],
            'engine_type' => $validated['engine_type'],
            'tire_size_front' => $validated['tire_size_front'],
            'tire_size_rear' => $validated['tire_size_rear'],
            'tire_pressure_front' => $validated['tire_pressure_front'],
            'tire_pressure_rear' => $validated['tire_pressure_rear'],
            'unit_tax_duedate' => $validated['unit_tax_duedate'],
            'image_unit' => $validated['image_unit'],
            'description' => $validated['description'],
            'status' => $validated['status'],
        ]);
        try {

            $barcodeLink = route('qrunits', $units->asset_code);
            $units->update(['link_barcode' => $barcodeLink]);

            return redirect()->route('units.index')->with('success', 'Unit berhasil dibuat.');
        } catch (\Exception $e) {
            return redirect()->route('units.index')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($asset_code)
    {
        $units = Unit::where('asset_code', $asset_code)->first();
        return view('units.show', compact('units'));
    }
    public function qrunits($asset_code)
    {
        $units = Unit::where('asset_code', $asset_code)->first();
        return view('units.qr', compact('units'));
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
    public function generate2($asset_code)
    {
        $units = Unit::firstWhere('asset_code', $asset_code);
        if (!$units->image_barcode) {
            $filename = "{$asset_code}.svg";
            $path = "img/qrunits/{$filename}";
            $url = asset('storage/' . $path);
            $qrcode = QrCode::size(400)->generate($units->link_barcode);
            Storage::disk('public')->put($path, $qrcode);
            Unit::where('id', $units->id)->update(['image_barcode' => 'storage/' . $path]);
        }

        return back();
    }
    public function cetak_pdf($asset_code)
    {
        $units = Unit::where('asset_code', $asset_code)->firstOrFail();
        $appUrl = config('app.url');

        $pdf = PDF::loadView('units.cetak_pdf', compact('units', 'appUrl'));

        return $pdf->download('barcode_' . $asset_code . '.pdf');
    }
}
