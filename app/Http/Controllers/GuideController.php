<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\Pupuk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GuideController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Panduan Pemberian Pupuk');
    }

    public function index()
    {
        $guides = Guide::orderBy('id', 'desc')->paginate(6);
        return view('dashboard.guides.index', compact('guides'));
    }


    public function create()
    {
        $sub = 'Buat Panduan';
        $pupuks = Pupuk::all();
        return view('dashboard.guides.create', compact('sub', 'pupuks'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'pupuk_id' => 'required|unique:guides',
            'body' => 'required'
        ]);
        $validated['excerpt'] = Str::limit(strip_tags($request->body), 50, '...');
        Guide::create($validated);
        return redirect()->route('guide.index')->with('success', 'Data berhasil disimpan');
    }


    public function show(Guide $guide)
    {
        return view('dashboard.guides.show', compact('guide'));
    }


    public function edit(Guide $guide)
    {
        $sub = 'Ubah Panduan';
        $pupuks = Pupuk::all();
        return view('dashboard.guides.edit', compact('sub', 'pupuks', 'guide'));
    }


    public function update(Request $request, Guide $guide)
    {
        $validated = $request->validate([
            'body' => 'required',
        ]);
        $validated['excerpt'] = Str::limit(strip_tags($request->body), 50, '...');
        if ($request->pupuk_id != $guide->pupuk_id) {
            $request->validate([
                'pupuk_id' => 'required|unique:guides,' . $guide->id,
            ], [
                'pupuk_id.unique' => 'Pupuk telah digunakan dalam panduan lain.',
            ]);
        }
        $guide->update($validated);
        return redirect()->route('guide.index')->with('success', 'Data berhasil diubah');
    }



    public function destroy(Guide $guide)
    {
        //
    }
}
