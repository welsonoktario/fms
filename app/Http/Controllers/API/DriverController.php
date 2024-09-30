<?php

namespace App\Http\Controllers\API;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends APIController
{
    public function index(Request $request)
    {
        $q = $request->query->get('q');

        try {
            $drivers = Driver::query()
                ->when($request->query->get('q'), function ($query) use ($q) {
                    return $query->where('nik', 'LIKE', "%$q%");
                })
                ->orderBy('name', 'ASC')
                ->get()
                ->map(function ($driver) {
                    return [
                        'id' => $driver->id,
                        'title' => "$driver->nik - $driver->name"
                    ];
                });

            return response()->json([
                'status' => 'ok',
                'data' => $drivers
            ]);
        } catch (\Throwable $exception) {
            return $this->handleApiException($exception, $request);
        }
    }
}
