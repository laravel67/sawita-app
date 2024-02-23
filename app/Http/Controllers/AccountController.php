<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user = auth()->user();

            if (!$user || (!$user->username && !$user->email)) {
                abort(403);
            }

            return $next($request);
        });
    }
    public function index()
    {
        $user = Auth::user();
        return view('users.profile', [
            'title' => 'Akun',
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'contact' => 'nullable|string',
            'address' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->address = $request->address;
        if ($request->file('image')) {
            if ($request->imageOld) {
                Storage::delete($request->imageOld);
            }
            // Store the new image and get the path
            $user->image = $request->file('image')->store('users');
        }
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
