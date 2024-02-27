<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galerry;

class GalerryController extends Controller
{

    public function index()
    {
    }

    public function create()
    {
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $images = [];
        foreach ($request->file('image') as $file) {
            $path = $file->store('gallery_images');
            $images[] = $path;
        }
        Galerry::create([
            'title' => $request->title,
            'images' => json_encode($images),
        ]);
        return redirect()->back()->with('success', 'Gallery uploaded successfully!');
    }

    public function show(Galerry $galerry)
    {
    }
    public function edit(Galerry $galerry)
    {
        //
    }

    public function update(Request $request, Galerry $galerry)
    {
        //
    }

    public function destroy(Galerry $galerry)
    {
        //
    }
}
