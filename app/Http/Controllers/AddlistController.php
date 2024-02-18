<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddlistController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Generated');
    }
    public function generating()
    {
        $sub = 'Hasil generate jadwal';
        return view('dashboard.jadwal.generated', compact('sub'));
    }
}
