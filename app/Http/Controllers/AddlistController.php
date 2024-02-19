<?php

namespace App\Http\Controllers;

use App\Models\Garden;
use Illuminate\Http\Request;

class AddlistController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Generated');
    }

    public function generating(Request $request)
    {
        $validatedData = $request->validate([
            'garden_id' => 'required',
            'jenis_tanah' => 'required',
            'keasaman' => 'required|numeric',
            'kelembaban' => 'required|numeric',
            'tujuan' => 'required',
        ]);
        $gardenId = $validatedData['garden_id'];
        $jenisTanah = $validatedData['jenis_tanah'];
        $keasaman = $validatedData['keasaman'];
        $kelembaban = $validatedData['kelembaban'];
        $tujuan = $validatedData['tujuan'];
        $garden = Garden::findOrFail($gardenId);
        if ($jenisTanah === 'Tanah Gambut') {
            $frekuensiPemupukan = 4;
        } else {
            $frekuensiPemupukan = 3;
        }
        $jadwalPemupukan = [];
        $currentDate = now();
        for ($i = 0; $i < 12; $i += $frekuensiPemupukan) {
            $tanggalPemupukan = clone $currentDate;
            $tanggalPemupukan->addMonths($i);
            $jadwalPemupukan[] = $tanggalPemupukan;
        }
        $sub = 'Hasil generate jadwal';
        return view(
            'dashboard.jadwal.generated',
            compact(
                'sub',
                'jadwalPemupukan',
                'garden',
                'jenisTanah',
                'keasaman',
                'kelembaban',
                'tujuan',
            )
        );
    }
}
