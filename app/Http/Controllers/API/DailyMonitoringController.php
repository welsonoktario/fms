<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Report\CreateReportRequest;
use App\Models\DailyMonitoringUnit;
use App\Models\Project;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
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
        Log::channel('api')->info('masukkk');

        try {
            Log::channel('api')->info('mulai proses');

            $user = $request->user();
            $data = $request->validated();

            $project = Project::query()
                ->where('id', $user->unit->project_id)
                ->withinProjectRadius($data['location']['lat'], $data['location']['lng'])
                ->first();

            if ($project['distance'] > $project->radius) {
                throw new Exception("Tidak bisa melakukan checklist diluar jangkauan proyek");
            }

            $photoFilename = uniqid('report_') . '.' . $data['photo']->getClientOriginalExtension();
            $pohotoPath = $request->file('photo')->storeAs('img/daily-monitoring-units', $photoFilename, 'local');

            if (!$pohotoPath) {
                throw new Exception("Terjadi kesalahan mengupload foto");
            }

            $report = $user->unit
                ->dailyMonitoringUnits()
                ->create([
                    'user_id' => $user->id,
                    'driver_id' => $data['driver'],
                    'conditions' => $data['conditions'],
                    'issue' => $data['issue'],
                    'status_unit' => $data['status'],
                    'photo' => $pohotoPath,
                ]);

            Log::channel('api')->info('selesai proses');

            return Response::json([
                'status' => 'ok',
                'data' => $report
            ]);
        } catch (\Throwable $exception) {
            Log::channel('api')->error($exception->getMessage());

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
