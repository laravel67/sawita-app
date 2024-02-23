<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
        view()->share('title', 'Pengaturan');
    }
    public function index()
    {
        $setting = Setting::first();
        return view('dashboard.setting.index', compact('setting'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'nullable|string|max:13',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:1024',
            'about' => 'nullable|string',
        ]);
        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('logos');
        }
        Setting::create($validated);
        return redirect()->route('setting.index')->with('success', 'Setting Aplikasi selesai');
    }

    public function update(Request $request, Setting $setting)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'nullable|string|max:13',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:1024',
            'about' => 'nullable|string',
        ]);
        if ($request->file('image')) {
            if ($request->imageOld) {
                Storage::delete($request->imageOld);
            }
            $validated['image'] = $request->file('image')->store('logos');
        }
        $excerpt = Str::words(strip_tags($validated['about']), 50, '');
        $validated['excerpt'] = $excerpt;
        Setting::where('id', $setting->id)->update($validated);
        return redirect()->route('setting.index')->with('success', 'Setting Aplikasi selesai');
    }
    public function destroy(Setting $setting)
    {
        //
    }
}
