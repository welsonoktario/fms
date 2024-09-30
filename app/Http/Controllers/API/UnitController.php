<?php

namespace App\Http\Controllers\API;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends APIController
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            $unit = $user->unit;

            return response()->json([
                'status' => 'ok',
                'data' => $unit
            ]);
        } catch (\Throwable $exception) {
            return $this->handleApiException($exception, $request);
        }
    }

    public function show(Request $request, int $id)
    {
        try {
            $unit = Unit::find($id);

            return response()->json([
                'status' => 'ok',
                'data' => $unit
            ]);
        } catch (\Throwable $exception) {
            return $this->handleApiException($exception, request());
        }
    }
}
