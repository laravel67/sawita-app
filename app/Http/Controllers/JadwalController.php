<?php

namespace App\Http\Controllers;

use App\Models\Analize;
use App\Models\Garden;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Jadwal Pemupukan');
    }
    public function index()
    {
        $jadwals = Jadwal::orderBy('garden_id')->orderByDesc('jadwal')->get();
        $groupedJadwals = $jadwals->groupBy('garden_id');
        return view('dashboard.jadwal.index', [
            'sub' => 'Jadwal Pemupukan',
            'groupedJadwals' => $groupedJadwals,
        ]);
    }


    public function create()
    {
        $analizes = Analize::all();
        return view('dashboard.jadwal.create', [
            'sub' => 'Generate Jadwal',
            'analizes' => $analizes,
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'garden_id' => 'required',
            'keasaman' => 'required',
            'kelembaban' => 'required',
            'tujuan' => 'required',
            'jadwal' => 'required|array',
            'jadwal.*' => 'required|date',
        ]);
        $jadwal = $request->jadwal;
        foreach ($jadwal as $jadwalItem) {
            Jadwal::create([
                'garden_id' => $request->garden_id,
                'keasaman' => $request->keasaman,
                'kelembaban' => $request->kelembaban,
                'tujuan' => $request->tujuan,
                'jadwal' => $jadwalItem,
            ]);
        }
        return redirect()->route('jadwal.index')->with('success', 'Jadwal Pemupukan berhasil ditambah');
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $jadwal->status = 1;
        $jadwal->save();
        return redirect()->back()->with('success', 'Status berhasil diubah');
    }


    public function destroy(Jadwal $jadwal)
    {
        Jadwal::destroy($jadwal->id);
        return back()->with('success', 'Data berhasil dihapus');
    }
}
