<?php

namespace App\Http\Controllers;

use App\Models\Analize;
use Illuminate\Http\Request;

class AnalizedController extends Controller
{
    public function __construct()
    {
        return view()->share('title', 'Hasil Analisis');
    }
    public function index()
    {
        $analizes = Analize::orderBy('id', 'desc')->get();
        return view('dashboard.analize.result.index', compact('analizes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis' => 'required',
            'keasaman' => 'required|numeric',
            'kelembaban' => 'required|numeric',
            'garden_id' => 'required',
            'pupuk_perbatang' => 'required',
            'pupuk_dibutuhkan' => 'required',
            'notes' => 'required',
            'jadwal_mupuk' => 'required',
        ]);
        Analize::create($validated);
        return redirect()->route('analize.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Analize $analize)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Analize $analize)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Analize $analize)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Analize $analize)
    {
        //
    }
}
