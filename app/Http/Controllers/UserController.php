<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        return view()->share('title', 'Daftar Pengguna');
    }
    public function index()
    {
        $users = User::latest()->get();
        return view('users.lists-user', [
            'sub' => '',
            'users' => $users
        ]);
    }
    public function create()
    {
        return view('users.add-user', [
            'sub' => 'Buat Pengguna Baru'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|confirmed'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('users.index')->with('success', 'Pengguna baru Berhasil ditambah');
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => 'required'
        ]);

        User::where('id', $user->id)->update($validated);

        return redirect()->back()->with('success', 'sekarang sebagai ' . $validated['role']);
    }

    public function destroy(User $user)
    {
        if ($user->image) {
            Storage::delete($user->image);
        }
        User::destroy($user->id);
        return back()->with('success', 'User berhasil dihapu');
    }
}
