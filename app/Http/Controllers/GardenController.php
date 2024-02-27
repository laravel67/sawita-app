<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Garden;

class GardenController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Data Lahan Perkebunan');
    }

    public function index()
    {
        $gardens = Garden::orderBy('id', 'desc')->paginate(5);
        return view('dashboard.garden.index', [
            'sub' => 'Data Lahan',
            'gardens' => $gardens
        ]);
    }

    public function create()
    {
        return view('dashboard.garden.create', [
            'sub' => 'Tambah Data Lahan'
        ]);
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => 'max:50|required|string|unique:gardens,name',
            'lokasi' => 'max:100|required|string',
            'luas' => 'required|numeric',
            'jumlah_batang' => 'required|numeric',
            'jenis_tanah' => 'required',
            'satuan' => 'required'
        ];
        $validated = $request->validate($rules);
        Garden::create($validated);
        return redirect()->route('garden.index')->with('success', 'Data berhasil disimpan');
    }
    public function edit(Garden $garden)
    {
        return view('dashboard.garden.edit', [
            'sub' => 'Ubah Data Lahan',
            'garden' => $garden
        ]);
    }
    public function update(Request $request, Garden $garden)
    {
        $rules = [
            'luas' => 'required|numeric',
            'jumlah_batang' => 'required|numeric',
            'jenis_tanah' => 'required',
            'satuan' => 'required'
        ];
        $rules['lokasi'] = [
            'required',
            'string',
            function ($attribute, $value, $fail) {
                if (count(explode(',', $value)) !== 2) {
                    $fail($attribute . ' harus terdiri dari tiga bagian yang dipisahkan oleh koma (kabupaten, kecamatan, kelurahan).');
                }
            }
        ];
        if ($request->name != $garden->name) {
            $rules['name'] = 'max:50|required|string|unique:gardens,name';
        }
        $validated = $request->validate($rules);
        Garden::where('id', $garden->id)->update($validated);
        return redirect()->route('garden.index')->with('success', 'Data berhasil diubah');
    }
    public function destroy(Garden $garden)
    {
        Garden::destroy($garden->id);
        return back()->with('success', 'Data berhasil dihapus');
    }
}
