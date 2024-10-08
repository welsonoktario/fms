<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Project;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //     $searchTerm = $request->input('searchTerm', '');
    // $projects = Project::where('name', 'like', "%$searchTerm%")->get();
        $units = Unit::all();
        $projects = Project::all();
        $users = User::all();
        return view('units.index',compact('units','projects','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = Unit::all();
        $projects = Project::all();
        $users = User::all();
        return view('units.create',compact('units','projects','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'asset_code' => 'required|string|max:255|unique:units,asset_code',
            // 'name' => 'required|string|max:255',
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
            'year' => 'required|string|max:255',
            'plate' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'meter' => 'required|string|max:255',
            'colour' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'serial' => 'required|string|max:255',
            'tire_size_front' => 'required|string|max:255',
            'tire_size_rear' => 'required|string|max:255',
            'tire_pressure_front' => 'required|string|max:255',
            'tire_pressure_rear' => 'required|string|max:255',
            'unit_tax_duedate' => 'required|date',
            'image_unit' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'required|string|max:255',
            'status' => 'required|in:ACTIVE,NOT ACTIVE',
        ]);
        try{
           $units =  Unit::create([
                'asset_code' => $validated['asset_code'],
                // 'nik' => $validated['nik'],
                'project_id' => $validated['project_id'],
                'user_id' => $validated['user_id'],
                'year' => $validated['year'],
                'plate' => $validated['plate'],
                'model' => $validated['model'],
                'meter' => $validated['meter'],
                'colour' => $validated['colour'],
                'type' => $validated['type'],
                'serial' => $validated['serial'],
                'tire_size_front' => $validated['tire_size_front'],
                'tire_size_rear' => $validated['tire_size_rear'],
                'tire_pressure_front' => $validated['tire_pressure_front'],
                'tire_pressure_rear' => $validated['tire_pressure_rear'],
                'unit_tax_duedate' => $validated['unit_tax_duedate'],
                'image_unit' => $validated['image_unit'],
                'description' => $validated['description'],
                'status' => $validated['status'],
            ]);
            if ($request->hasFile('image_unit')) {
                $file = $request->file('image_unit');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/images/units', $filename);
                $validated['image_unit'] = $filename;
            }
            $barcodeLink = route('show', $units->asset_code);
            $units->update(['link_barcode' => $barcodeLink]);
            return redirect()->route('units.index')->with('success', 'Units created successfully.');
        } catch (\Exception $e) {
            return redirect()->route('units.index')->with('error', 'An error occurred: ' . $e->getMessage());
        // return redirect()->route('units.index',compact('units'));
    }
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
    public function generate($asset_code)
    {
        $units = Unit::firstWhere('asset_code',$asset_code);
        if (!$units->image_barcode);
        {
            $filename = public_path("img") . "/qr/{$asset_code}.svg";
            $url = asset('img/qrunits/' . "{$asset_code}.svg");
            $qrcode = QrCode::size(400)->generate($units->link_barcode, $filename);
            Driver::where('id',$units->id)->update(['image_barcode'=>$url]);
        }
    return back();
}
}
