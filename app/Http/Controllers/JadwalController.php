<?php

namespace App\Http\Controllers;

use App\Models\Garden;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Jadwal Pemupukan');
    }
    public function index()
    {
        return view('dashboard.jadwal.index', [
            'sub' => ''
        ]);
    }

    public function create()
    {
        $gardens = Garden::all();
        return view('dashboard.jadwal.create', [
            'sub' => 'Generate Jadwal',
            'gardens' => $gardens
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
