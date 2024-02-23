<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MultiController extends Controller
{
    public function show()
    {
        $show = Setting::first();
        return view('about', [
            'title' => 'Tentang Sawita Raya',
            'show' => $show
        ]);
    }


    public function destroy($gardenId)
    {
        $this->authorize('admin');
        Jadwal::where('garden_id', $gardenId)->delete();
        return Redirect::back()->with('success', 'Semua jadwal untuk lahan ini berhasil dihapus');
    }
}
