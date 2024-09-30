<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $table = 'units';
    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dailyMonitoringUnits()
    {
        return $this->hasMany(DailyMonitoringUnit::class);
    }

    /**
     * Get the first daily monitoring unit for today.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function todayReport()
    {
        return $this->hasOne(DailyMonitoringUnit::class)->whereDate('created_at', date('Y-m-d'));
    }

    /**
     * Get the first daily monitoring unit for today.
     *
     * @return \App\Models\DailyMonitoringUnit|null
     */
    public function firstTodayDailyMonitoringUnit()
    {
        return $this->todayReport()->first();
    }
}
