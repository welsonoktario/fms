<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Report\CreateReportRequest;
use App\Models\DailyMonitoringUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\UnauthorizedException;

class DailyMonitoringController extends APIController
{
    public function index(Request $request)
    {
        $year = $request->query('year');
        $month = $request->query('month');

        try {
            /** @var \App\Models\User $user **/
            $user = $request->user();

            // Eager load the unit data
            $unit = $user->unit;

            $dailyMonitoringUnits = $unit->dailyMonitoringUnits()
                ->with('driver')
                ->when($month && $year, function ($q) use ($month, $year) {
                    $dateStart = Carbon::create($year, $month)->firstOfMonth();
                    $dateEnd = Carbon::create($year, $month)->lastOfMonth();

                    return $q->whereDate('created_at', '>=', $dateStart)
                        ->whereDate('created_at', '<=', $dateEnd);
                })
                ->orderBy('created_at', 'DESC')
                ->get();

            $dailyMonitoringUnits = $dailyMonitoringUnits->groupBy(function ($item, $key) {
                return Carbon::parse($item['created_at'], 'Asia/Jakarta')->translatedFormat('F Y');
            });

            return Response::json([
                'status' => 'ok',
                'data' => $dailyMonitoringUnits
            ]);
        } catch (\Throwable $exception) {
            return $this->handleApiException($exception, $request);
        }
    }

    public function show(Request $request, DailyMonitoringUnit $dailyMonitoringUnit)
    {
        try {
            /** @var \App\Models\User $user **/
            $user = $request->user();
            $dailyMonitoringUnit->load(['unit', 'user', 'driver']);

            if ($dailyMonitoringUnit->user_id != $user->id) {
                throw new UnauthorizedException('Unathorized', 403);
            }

            return Response::json([
                'status' => 'ok',
                'data' => $dailyMonitoringUnit
            ]);
        } catch (\Throwable $exception) {
            return $this->handleApiException($exception, $request);
        }
    }

    public function store(CreateReportRequest $request)
    {
        try {
            $user = $request->user();
            $data = $request->validated();

            $isReady = !$data['issue'] && collect($data['conditions'])->every(function ($condition) {
                return !$condition['issue'];
            });
            $report = $user->unit
                ->dailyMonitoringUnits()
                ->create([
                    'user_id' => $user->id,
                    'driver_id' => $data['driver'],
                    'conditions' => $data['conditions'],
                    'issue' => $data['issue'],
                    'status_unit' => $isReady ? 'READY' : 'NOT READY',
                ]);

            return Response::json([
                'status' => 'ok',
                'data' => $report
            ]);
        } catch (\Throwable $exception) {
            return $this->handleApiException($exception, $request);
        }
    }

    public function today(Request $request)
    {
        try {
            /** @var \App\Models\User $user **/
            $user = $request->user();

            // Eager load the unit data
            $unit = $user->unit;

            $dailyMonitoringUnits = $unit->dailyMonitoringUnits()
                ->with('driver')
                ->whereDate('created_at', today('Asia/Jakarta'))
                ->orderBy('created_at', 'DESC')
                ->get();

            return Response::json([
                'status' => 'ok',
                'data' => $dailyMonitoringUnits
            ]);
        } catch (\Throwable $exception) {
            return $this->handleApiException($exception, $request);
        }
    }
}
