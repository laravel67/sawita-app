<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        view()->share('title', 'Home');
    }
    public function index()
    {
        $slides = Slide::latest()->get();
        return view('home', compact('slides'));
    }
    public function create()
    {
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('slides');
        }
        Slide::create($validatedData);
        return back()->with('success', 'Slide berhasil ditambah');
    }
}
