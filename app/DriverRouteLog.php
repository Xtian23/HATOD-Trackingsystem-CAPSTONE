<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverRouteLog extends Model
{
    protected $fillable = [
        'lat',
        'lng',
        'order_id',
        'personnel_id',
        'order_id',
    ];

    public function scopeLatestByPersonnel($query)
    {
        $latest = self::selectRaw('MAX(id) AS id')
            ->groupBy('personnel_id')
            ->get();

        return $query->selectRaw('lat, lng, personnel_id, order_id, id')
            ->whereIn('id', $latest->pluck('id'));
    }
}
