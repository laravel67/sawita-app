<?php

namespace App\Http\Controllers;

use App\Models\Analisi;
use App\Models\Garden;
use Illuminate\Http\Request;

class AnalisiController extends Controller
{
    public function __construct()
    {
        return view()->share('title', 'Hasil Analisis');
    }
    public function index()
    {
        $analisis = Analisi::orderBy('id', 'desc')->get();
        return view('dashboard.analisis.index', compact('analisis'));
    }

    public function create()
    {
        $gardens = Garden::all();
        $sub = '';
        return view('dashboard.analisis.create', compact('gardens', 'sub'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'garden_id' => 'required|numeric|unique:analisis,garden_id',
            'jenis' => 'required|string',
            'keasaman' => 'required|numeric',
            'kelembaban' => 'required|numeric',
        ]);
        Analisi::create($validatedData);
        return redirect()->route('analisi.index')->with('succes', 'Data Analisi berhasil disimpan');
    }
    public function destroy(Analisi $analisi)
    {
        $analisi->delete();
        return back()->with('success', 'Data analisis berhasil dihapus');
    }
}
