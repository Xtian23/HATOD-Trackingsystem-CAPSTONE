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
        return $query->selectRaw('MAX(lat) AS lat, MAX(lng) AS lng, personnel_id')
            ->groupBy('personnel_id');
    }
}
