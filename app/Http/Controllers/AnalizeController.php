<?php

namespace App\Http\Controllers;

use App\Models\Pupuk;
use App\Models\Garden;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AnalizeController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Analisis Lahan');
    }

    public function index()
    {
        $gardens = Garden::all();
        $sub = 'Analisis Lahan';
        return view('dashboard.analize.analize', compact('sub', 'gardens'));
    }

    public function analize(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'garden_id' => 'required|numeric',
                'jenis' => 'required|string',
                'keasaman' => 'required|numeric',
                'kelembaban' => 'required|numeric',
            ]);

            $garden = Garden::findOrFail($request->garden_id);
            $luas = $garden->luas;
            $garden_id = $garden->id;
            $garden_name = $garden->name;
            $batang = $garden->jumlah_batang;
            $jenisTanah = $request->jenis;
            $keasaman = $request->keasaman;
            $kelembaban = $request->kelembaban;
            $results = $this->analisisTanah($jenisTanah, $keasaman, $kelembaban);
            $pupuk_perbatang = 2;
            $pupuk_dibutuhkan = $pupuk_perbatang * $batang;
            $data = [
                'jenis' => $jenisTanah,
                'keasaman' => $keasaman,
                'kelembaban' => $kelembaban
            ];
            $pemupukanInterval = $this->getPemupukanInterval($jenisTanah, $keasaman, $kelembaban);
            return view('dashboard.analize.result', compact('results', 'data', 'luas', 'pupuk_dibutuhkan', 'pupuk_perbatang', 'garden_id', 'garden_name', 'pemupukanInterval'));
        } catch (ModelNotFoundException $e) {
            return back()->with('error', 'Lahan tidak ditemukan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memproses data.');
        }
    }

    private function analisisTanah($jenisTanah, $keasaman, $kelembaban)
    {
        $pemupukanInterval = null;
        if ($jenisTanah == 'Tanah Gambut') {
            if ($keasaman < 5.5) {
                $pupukRekomendasi = $this->getRecommendedFertilizer(1);
                $pemupukanInterval = 'Setiap 2 minggu';
                return "Diperlukan pemupukan khusus untuk meningkatkan kesuburan tanah, terutama untuk menyeimbangkan pH tanah dan menyediakan nutrisi yang diperlukan. Rekomendasi pupuk: <strong>$pupukRekomendasi</strong>";
            } else {
                $pupukRekomendasi = $this->getRecommendedFertilizer(2);
                $pemupukanInterval = 'Setiap bulan';
                return "Tanah gambut dengan pH normal, tetapi perlu pemupukan untuk menjaga kesuburan tanah. Rekomendasi pupuk:  <strong>$pupukRekomendasi</strong>";
            }
        } elseif ($jenisTanah == 'Tanah Alluvial') {
            $pupukRekomendasi = $this->getRecommendedFertilizer(3);
            $pemupukanInterval = 'Setiap 2 bulan';
            return "Perlu pemupukan reguler untuk menjaga kesuburan tanah dan memastikan ketersediaan nutrisi yang cukup. Rekomendasi pupuk:  <strong>$pupukRekomendasi</strong>";
        } elseif ($jenisTanah == 'Tanah Laterit') {
            $pupukRekomendasi = $this->getRecommendedFertilizer(4);
            $pemupukanInterval = 'Setiap 3 bulan';
            return "Perlu pemupukan untuk menjaga kesuburan tanah dan keseimbangan unsur hara yang dibutuhkan oleh tanaman sawit. Rekomendasi pupuk:  <strong>$pupukRekomendasi</strong>";
        } elseif ($jenisTanah == 'Tanah Podzolik') {
            $pupukRekomendasi = $this->getRecommendedFertilizer(5);
            $pemupukanInterval = 'Setiap 1 bulan';
            return "Perlu pemupukan untuk menjaga keseimbangan pH tanah dan ketersediaan unsur hara yang dibutuhkan oleh tanaman sawit. Rekomendasi pupuk:  <strong>$pupukRekomendasi</strong>";
        } else {
            return "Jenis tanah tidak dikenali.";
        }
    }

    private function getRecommendedFertilizer($pupukId)
    {
        $pupuk = Pupuk::where('id', $pupukId)->first();
        if ($pupuk) {
            return $pupuk->name;
        } else {
            return "Pupuk tidak ditemukan";
        }
    }
    private function getPemupukanInterval($jenisTanah, $keasaman, $kelembaban)
    {
        if ($jenisTanah == 'Tanah Gambut') {
            if ($keasaman < 5.5) {
                return 'Setiap 2 minggu';
            } else {
                return 'Setiap bulan';
            }
        } elseif ($jenisTanah == 'Tanah Alluvial') {
            return 'Setiap 2 bulan';
        } elseif ($jenisTanah == 'Tanah Laterit') {
            return 'Setiap 3 bulan';
        } elseif ($jenisTanah == 'Tanah Podzolik') {
            return 'Setiap 1 bulan';
        } else {
            return 'Tidak ditentukan';
        }
    }
}
