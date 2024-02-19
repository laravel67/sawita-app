<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SettController extends Controller
{
    public function destroy($gardenId)
    {
        Jadwal::where('garden_id', $gardenId)->delete();
        return Redirect::back()->with('success', 'Semua jadwal untuk lahan ini berhasil dihapus');
    }
}
