<?php

namespace App\Http\Controllers;

use App\Models\Analisi;
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
        $analisis = Analisi::latest()->get();
        return view('dashboard.jadwal.create', [
            'sub' => 'Generate Jadwal',
            'analisis' => $analisis,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'garden_id' => 'required',
            'keasaman' => 'required',
            'kelembaban' => 'required',
            'tujuan' => 'required',
            'pupuk_id' => 'required',
            'pupuk_perbatang' => 'required',
            'total_pupuk' => 'required',
            'jadwal' => 'required|array',
            'jadwal.*' => 'required|date',
        ]);

        $totalPupuk = $request->total_pupuk;
        $jumlahJadwal = count($validatedData['jadwal']);
        $total = $totalPupuk / $jumlahJadwal;

        foreach ($validatedData['jadwal'] as $jadwalItem) {
            Jadwal::create([
                'garden_id' => $validatedData['garden_id'],
                'keasaman' => $validatedData['keasaman'],
                'kelembaban' => $validatedData['kelembaban'],
                'tujuan' => $validatedData['tujuan'],
                'pupuk_id' => $validatedData['pupuk_id'],
                'jadwal' => $jadwalItem,
                'pupuk_perbatang' => $validatedData['pupuk_perbatang'],
                'total_pupuk' => $total,
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
