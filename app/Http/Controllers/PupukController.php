<?php

namespace App\Http\Controllers;

use App\Models\Pupuk;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PupukController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Data Pupuk');
    }

    public function index()
    {
        $pupuks = Pupuk::orderBy('id', 'desc')->paginate(10);
        return view('dashboard.pupuk.index', [
            'sub' => 'Daftar Pupuk',
            'pupuks' => $pupuks
        ]);
    }


    public function create()
    {
        $categories = Category::all();
        return view('dashboard.pupuk.create', [
            'sub' => 'Tambah Data Pupuk',
            'categories' => $categories
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:pupuks',
            'category_id' => 'required',
            'satuan' => 'required',
            'kegunaan' => 'required',
            'penggunaan' => 'required',
            'stok' => 'required|integer',
            'image' => 'max:1024|image|nullable',
        ]);
        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('images');
        }
        Pupuk::create($validated);
        return redirect()->route('pupuk.index')->with('success', 'Data berhasil ditambah');
    }


    public function show(Pupuk $pupuk)
    {
        //
    }


    public function edit(Pupuk $pupuk)
    {
        return view('dashboard.pupuk.edit', [
            'title' => 'Katalog Pupuk',
            'sub' => 'Ubah Data Pupuk',
            'pupuk' => $pupuk,
            'categories' => Category::all()
        ]);
    }


    public function update(Request $request, Pupuk $pupuk)
    {
        $rules = [
            'category_id' => 'required',
            'satuan' => 'required',
            'kegunaan' => 'required',
            'penggunaan' => 'required',
            'stok' => 'required|integer',
            'image' => 'max:1024|image|nullable',
        ];
        if ($request->name != $pupuk->name) {
            $rules['name'] = 'required|string|max:255|unique:pupuks';
        }
        $validated = $request->validate($rules);
        if ($request->file('image')) {
            if ($request->imageOld) {
                Storage::delete($request->imageOld);
            }
            $validated['image'] = $request->file('image')->store('images');
        }
        Pupuk::where('id', $pupuk->id)->update($validated);
        return redirect()->route('pupuk.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy(Pupuk $pupuk)
    {
        if ($pupuk->image) {
            Storage::delete($pupuk->image);
        }
        Pupuk::destroy($pupuk->id);

        return back()->with('success', 'Data berhasil dihapus');
    }
}
