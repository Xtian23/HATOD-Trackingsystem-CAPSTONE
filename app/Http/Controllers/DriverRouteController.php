<?php

namespace App\Http\Controllers;

use App\DriverRouteLog;
use App\Personnel;

class DriverRouteController extends Controller
{
    public function __invoke()
    {
        $drivers = Personnel::driver()->get();

        return view('driver-route', compact('drivers'));
    }

    public function getLatestPositions()
    {
        return response()->json([
            'data' => DriverRouteLog::latestByPersonnel()->get(),
        ]);
    }
}
