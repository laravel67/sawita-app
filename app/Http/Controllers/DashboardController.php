<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Stok;
use App\Models\User;
use App\Models\Garden;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $stok = Stok::all();
        $garden = Garden::all();
        $users = User::count();

        // Get the current year
        $currentYear = Carbon::now()->year;

        // Query to get the count of status 1 records for the current year
        $statusOneCount = Jadwal::where('status', 1)
            ->whereYear('jadwal', $currentYear)
            ->count();

        // Query to get the total count of records for the current year
        $totalRows = Jadwal::whereYear('jadwal', $currentYear)
            ->count();

        // Calculate percentage
        $percentage = ($totalRows > 0) ? ($statusOneCount / $totalRows) * 100 : 0;

        // Fetch garden data for the current year
        $gardenData = [];
        foreach ($garden as $g) {
            $statusOneCount = Jadwal::where('garden_id', $g->id)
                ->where('status', 1)
                ->whereYear('jadwal', $currentYear)
                ->count();
            $totalRows = Jadwal::where('garden_id', $g->id)
                ->whereYear('jadwal', $currentYear)
                ->count();
            $percentage = ($totalRows > 0) ? ($statusOneCount / $totalRows) * 100 : 0;

            $gardenData[] = [
                'name' => "Lahan {$g->name}",
                'y' => $percentage,
                'drilldown' => "Lahan {$g->id}"
            ];
        }

        return view('dashboard.index', compact('title', 'stok', 'garden', 'percentage', 'gardenData', 'users'));
    }
}
