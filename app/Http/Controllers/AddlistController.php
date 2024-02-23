<?php

namespace App\Http\Controllers;

use App\Models\Garden;
use App\Models\Analize;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class AddlistController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Generated');
    }

    public function generating(Request $request)
    {
        $analizeData = Analize::where('garden_id', $request->garden_id)->first();

        if (!$analizeData) {
            return back()->with('error', 'Lahan ini belum dianalisis. Silakan ke halaman analisis!');
        }

        $validatedData = $request->validate([
            'garden_id' => 'required',
            'jenis' => ['required', Rule::in([$analizeData->jenis])],
            'keasaman' => 'required|numeric|min:0|max:14',
            'kelembaban' => 'required|numeric|min:0|max:100',
            'tujuan' => 'required',
        ], [
            'jenis_tanah.required' => 'The jenis tanah field is required.',
            'jenis_tanah.in' => 'The selected jenis tanah is invalid.',
            'keasaman.required' => 'The keasaman field is required.',
            'keasaman.numeric' => 'The keasaman field must be a number.',
            'keasaman.min' => 'The keasaman field must be at least :min.',
            'keasaman.max' => 'The keasaman field may not be greater than :max.',
            'kelembaban.required' => 'The kelembaban field is required.',
            'kelembaban.numeric' => 'The kelembaban field must be a number.',
            'kelembaban.min' => 'The kelembaban field must be at least :min.',
            'kelembaban.max' => 'The kelembaban field may not be greater than :max.',
            'tujuan.required' => 'The tujuan field is required.',
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

    private function getFrekuensiPemupukan($jenisTanah, $tujuanPemupukan)
    {
        switch ($jenisTanah) {
            case 'Tanah Gambut':
                if ($tujuanPemupukan == 'Buah') {
                    return 3; // Pemupukan setiap 3 bulan
                } elseif ($tujuanPemupukan == 'Batang') {
                    return 2; // Pemupukan setiap 2 bulan
                } else {
                    return 4; // Pemupukan setiap 4 bulan
                }
                break;
            case 'Tanah Alluvial':
                if ($tujuanPemupukan == 'Buah') {
                    return 2; // Pemupukan setiap 2 bulan
                } elseif ($tujuanPemupukan == 'Batang') {
                    return 1; // Pemupukan setiap bulan
                } else {
                    return 3; // Pemupukan setiap 3 bulan
                }
                break;
            case 'Tanah Laterit':
                if ($tujuanPemupukan == 'Buah') {
                    return 4; // Pemupukan setiap 4 bulan
                } elseif ($tujuanPemupukan == 'Batang') {
                    return 3; // Pemupukan setiap 3 bulan
                } else {
                    return 6; // Pemupukan setiap 6 bulan
                }
                break;
            case 'Tanah Podzolik':
                if ($tujuanPemupukan == 'Buah') {
                    return 1; // Pemupukan setiap bulan
                } elseif ($tujuanPemupukan == 'Batang') {
                    return 2; // Pemupukan setiap 2 bulan
                } else {
                    return 3; // Pemupukan setiap 3 bulan
                }
                break;
            default:
                return 0; // Tidak ditentukan
                break;
        }
    }
}
