<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Stok;
use App\Models\User;
use App\Models\Pupuk;
use App\Models\Garden;
use App\Models\Jadwal;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $stoks = Stok::sum('total');
        $pupuks = Pupuk::count();
        $garden = Garden::all();
        $users = User::count();
        $currentYear = Carbon::now()->year;
        $statusOneCount = Jadwal::where('status', 1)
            ->whereYear('jadwal', $currentYear)
            ->count();
        $totalRows = Jadwal::whereYear('jadwal', $currentYear)
            ->count();
        $percentage = ($totalRows > 0) ? ($statusOneCount / $totalRows) * 100 : 0;
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
        return view('dashboard.index', compact('title', 'stoks', 'garden', 'percentage', 'gardenData', 'users', 'pupuks'));
    }
}
