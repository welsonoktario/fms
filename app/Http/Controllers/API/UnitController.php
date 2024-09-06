<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;

class UnitController extends APIController
{
    public function index(Request $request)
    {
        try {
            $user = $request->user();
            $units = $user->units;

            return response()->json([
                'success' => true,
                'data' => $units
            ]);
        } catch (\Throwable $exception) {
            return $this->handleApiException($exception, request());
        }
    }
}
