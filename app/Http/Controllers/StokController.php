<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Pupuk;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class StokController extends Controller
{
    public function __construct()
    {
        return view()->share('title', 'Tambah Stok');
    }
    public function index()
    {
        $stoks = Stok::orderBy('id', 'desc')->paginate(5);
        return view('dashboard.pupuk.stoks.index', [
            'stoks' => $stoks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pupuks = Pupuk::latest()->get();
        return view('dashboard.pupuk.stoks.create', [
            'pupuks' => $pupuks,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pupuk_id' => 'required|exists:pupuks,id',
            'stok_in' => 'required|numeric',
        ]);
        $existingStoker = Stok::where('pupuk_id', $validatedData['pupuk_id'])
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->first();

        if ($existingStoker) {
            $existingStoker->stok_in += $validatedData['stok_in'];
            $existingStoker->stok_out += $request->input('stok_out', 0);
            $existingStoker->total = $existingStoker->stok_in - $existingStoker->stok_out;
            $existingStoker->save();
        } else {
            $stoker = new Stok();
            $stoker->pupuk_id = $validatedData['pupuk_id'];
            $stoker->stok_in = $validatedData['stok_in'];
            $stoker->stok_out = $request->input('stok_out', 0); // tambahkan stok_out jika ada
            $stoker->total = $validatedData['stok_in'] - $stoker->stok_out;
            $stoker->save();
        }
        return redirect()->route('pupuk.index')->with('success', 'Stok pupuk berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stok $stok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stok $stok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stok $stok)
    {
        $stok->delete();
        return back()->with('success', 'Stok pupuk berhasil dihapus');
    }
}
