<?php

namespace App\Exports;

use App\Models\DailyMonitoringUnit;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class DailymonitoringExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    private $project = 'all';
    private $dari;
    private $ke;

    public function __construct($project, $dari, $ke)
    {
        $this->project = $project;
        $this->dari = $dari;
        $this->ke = $ke;
    }

    public function query()
    {
        $query = DailyMonitoringUnit::query()
            ->with(['project'])
            ->when($this->project != 'all', function ($q) {
                return $q->where('project_id', $this->project);
            });

        if ($this->dari && $this->ke) {
            $query = $query->whereBetween('created_at', [$this->dari, $this->ke]);
        }

        $query = $query->orderBy('created_at', 'DESC')
            ->orderBy('id', 'ASC');

        return $query;
    }

    public function headings(): array
    {
        return [
            'ID',
            'TANGGAL CEKLIST',
            'ID UNIT',
            'ID DRIVER',
            'PROYEK',
            'STATUS UNIT',
        ];
    }

    /**
     * @param DailyMonitoringUnit $daily
     */
    public function map($daily): array
    {
        return [
            $daily->id,
            Carbon::parse($daily->created_at)->format('d M Y'),
            $daily->unit->asset_code,
            $daily->driver->name,
            $daily->project->name,
            $daily->status_unit,
        ];
    }
}
