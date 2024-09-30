<?php

namespace App\Http\Controllers\API;

use App\Models\DailyMonitoringUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\UnauthorizedException;

class DailyMonitoringController extends APIController
{
    public function index(Request $request)
    {
        try {
            /** @var \App\Models\User $user **/
            $user = $request->user();

            // Eager load the unit data
            $unit = $user->unit;

            // Load today's daily monitoring unit
            $unit->load([
                'todayReport' => function ($query) {
                    $query->orderBy('created_at', 'asc'); // Ensure the first record is retrieved
                }
            ]);

            return Response::json([
                'status' => 'ok',
                'data' => $unit
            ]);
        } catch (\Throwable $exception) {
            return $this->handleApiException($exception, request());
        }
    }

    public function show(Request $request, DailyMonitoringUnit $dailyMonitoringUnit)
    {
        try {
            /** @var \App\Models\User $user **/
            $user = $request->user();

            if ($dailyMonitoringUnit->user_id != $user->id) {
                throw new UnauthorizedException('Unathorized', 403);
            }

            return Response::json([
                'status' => 'ok',
                'data' => $dailyMonitoringUnit
            ]);
        } catch (\Throwable $exception) {
            return $this->handleApiException($exception, request());
        }
    }
}
