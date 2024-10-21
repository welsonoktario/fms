<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\Traits\HasSpatial;

class Project extends Model
{
    use HasFactory, HasSpatial;

    protected $table = 'projects';
    protected $guarded = [];
    protected $casts = [
        'location' => Point::class
    ];

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    /**
     * Scope a query to filter projects that are within their own radius from a given point.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query The Eloquent query builder.
     * @param float $lat The latitude of the point to measure from (e.g., user's location).
     * @param float $lng The longitude of the point to measure from (e.g., user's location).
     *
     * @return \Illuminate\Database\Eloquent\Builder The modified query builder.
     */
    public function scopeWithinProjectRadius($query, $lat, $lng)
    {
        // Haversine formula for distance calculation in meters
        $haversine = "(6371000 * acos(cos(radians(?)) * cos(radians(ST_Y(location))) * cos(radians(ST_X(location)) - radians(?)) + sin(radians(?)) * sin(radians(ST_Y(location)))))";

        // Apply the query
        return $query
            ->select('id', 'name', 'timezone', 'location', 'radius')
            ->selectRaw("{$haversine} AS distance", [$lat, $lng, $lat])
            ->whereNotNull('radius');
    }
}
