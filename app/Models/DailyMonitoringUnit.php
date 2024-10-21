<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyMonitoringUnit extends Model
{
    use HasFactory;

    protected $table = 'daily_monitoring_units';
    protected $guarded = ['id'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'conditions' => 'array',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class,'driver_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class,'unit_id');
    }
}
