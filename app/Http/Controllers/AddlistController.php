<?php

namespace App\Http\Controllers;

use App\Models\Analisi;
use App\Models\Pupuk;
use App\Models\Garden;
use Illuminate\Http\Request;

class AddlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        view()->share('title', 'Hasil Generate Jadwal');
    }

    public function generating(Request $request)
    {
        $analiseData = Analisi::where('garden_id', $request->garden_id)->first();
        $validatedData = $request->validate([
            'garden_id' => 'required',
            'jenis' => 'required',
            'keasaman' => 'required|numeric|min:0|max:14',
            'kelembaban' => 'required|numeric|min:0|max:100',
            'tujuan' => 'required',
        ]);

        $gardenId = $validatedData['garden_id'];
        $jenisTanah = $validatedData['jenis'];
        $keasaman = $validatedData['keasaman'];
        $kelembaban = $validatedData['kelembaban'];
        $tujuan = $validatedData['tujuan'];

        $garden = Garden::findOrFail($gardenId);

        $frekuensiPemupukan = $this->getFrekuensiPemupukan($jenisTanah, $tujuan);
        $jadwalPemupukan = [];
        $currentDate = now();

        for ($i = 0; $i < 12; $i += $frekuensiPemupukan) {
            $tanggalPemupukan = clone $currentDate;
            $tanggalPemupukan->addMonths($i);
            $jadwalPemupukan[] = $tanggalPemupukan;
        }

        $pupuks = Pupuk::all();
        $jumlah_batang = $garden->jumlah_batang;

        $requiredAmountPerPlant = $this->calculateRequiredAmountPerPlant($jenisTanah, $tujuan);
        $totalPupuk = $this->calculateTotalFertilizer($jenisTanah, $keasaman, $kelembaban, $tujuan, $jumlah_batang);

        $sub = 'Hasil generate jadwal';

        return view('dashboard.jadwal.generated', compact(
            'sub',
            'jadwalPemupukan',
            'garden',
            'jenisTanah',
            'keasaman',
            'kelembaban',
            'tujuan',
            'requiredAmountPerPlant',
            'totalPupuk',
            'pupuks'
        ));
    }

    private function getFrekuensiPemupukan($jenisTanah, $tujuanPemupukan)
    {
        switch ($jenisTanah) {
            case 'Tanah Gambut':
                return $tujuanPemupukan == 'Buah' ? 3 : ($tujuanPemupukan == 'Batang' ? 2 : 4);
            case 'Tanah Alluvial':
                return $tujuanPemupukan == 'Buah' ? 2 : ($tujuanPemupukan == 'Batang' ? 1 : 3);
            case 'Tanah Laterit':
                return $tujuanPemupukan == 'Buah' ? 4 : ($tujuanPemupukan == 'Batang' ? 3 : 6);
            case 'Tanah Podzolik':
                return $tujuanPemupukan == 'Buah' ? 1 : ($tujuanPemupukan == 'Batang' ? 2 : 3);
            default:
                return 0;
        }
    }

    private function calculateRequiredAmountPerPlant($jenisTanah, $tujuanPemupukan)
    {
        switch ($jenisTanah) {
            case 'Tanah Gambut':
                return $tujuanPemupukan == 'Buah' ? 2 : ($tujuanPemupukan == 'Batang' ? 1.5 : 3);
            case 'Tanah Alluvial':
                return $tujuanPemupukan == 'Buah' ? 1.5 : ($tujuanPemupukan == 'Batang' ? 1 : 2);
            case 'Tanah Laterit':
                return $tujuanPemupukan == 'Buah' ? 3 : ($tujuanPemupukan == 'Batang' ? 2 : 4);
            case 'Tanah Podzolik':
                return $tujuanPemupukan == 'Buah' ? 1 : ($tujuanPemupukan == 'Batang' ? 1.5 : 2);
            default:
                return 0;
        }
    }

    private function calculateTotalFertilizer($jenisTanah, $keasaman, $kelembaban, $tujuan, $jumlah_batang)
    {
        $requiredAmountPerPlant = $this->calculateRequiredAmountPerPlant($jenisTanah, $tujuan);
        return $requiredAmountPerPlant * $jumlah_batang;
    }
}
