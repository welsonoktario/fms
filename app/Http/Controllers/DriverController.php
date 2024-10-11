<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::where('status','ACTIVE')->get();
        return view('driver.index',compact('drivers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $drivers = Driver::all();
        return view('driver.create',compact('drivers'));
    }

    /**
     * Store a newly created resource in storage.
     */
        // public function store(Request $request)
        // {
        //     $validated = $request->validate([
        //         'name' => 'required|string|max:255',
        //         'nik' => 'required|string|max:255',
        //     ]);

        //     $driver = Driver::create([
        //         'name' => $validated['name'],
        //         'nik' => $validated['nik'],
        //     ]);
        //     $barcodeLink = route('show', $driver->nik);
        //     $driver->update(['link_barcode' => $barcodeLink]);

        //     return redirect()->route('drivers.index');
        // }
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'nik' => 'required|string|max:255|unique:drivers,nik',
        'phone_number' => 'required|string|max:255|unique:drivers,phone_number',
        'provider' => 'required|string|in:TELKOMSEL,INDOSAT,XL AXIATA, SMARTFREN',
        'status' => 'required|string|in:ACTIVE,NOT ACTIVE',
    ]);
    try{
        $drivers = Driver::create([
            'name' => $validated['name'],
            'nik' => $validated['nik'],
            'phone_number' => $validated['phone_number'],
            'provider' => $validated['provider'],
            'status' => $validated['status'],
        ]);
        // dd($drivers);
        $barcodeLink = route('showqr', $drivers->nik);
        $drivers->update(['link_barcode' => $barcodeLink]);
        return redirect()->route('drivers.index')->with('success', 'Driver created successfully.');
    } catch (\Exception $e) {
        return redirect()->route('drivers.index')->with('error', 'An error occurred: ' . $e->getMessage());
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
    public function generate($nik)
    {
        $drivers = Driver::firstWhere('nik',$nik);
        if (!$drivers->image_barcode);
        {
            $filename = public_path("img") . "/qrdrivers/{$nik}.svg";
            $url = asset('img/qrdrivers/' . "{$nik}.svg");
            $qrcode = QrCode::size(400)->generate($drivers->link_barcode, $filename);
            Driver::where('id',$drivers->id)->update(['image_barcode'=>$url]);
        }
    return back();
}
}
