<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
        view()->share('title', 'Jenis/Kategori Pupuk');
    }

    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(5);
        return view('dashboard.categories.index', [
            'sub' => 'Jenis/Kategori Pupuk',
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('dashboard.categories.create', [
            'sub' => 'Tambah Kategori/Jenis Pupuk'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);
        Category::create($validated);
        return redirect()->route('category.index')->with('success', 'Kategori berhasil ditambah');
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'sub' => 'Ubah Kategori/Jenis Pupuk',
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $rule = [
            'name' => 'required|string|max:255|unique:categories'
        ];
        $validated = $request->validate($rule);
        Category::where('id', $category->id)->update($validated);
        return redirect()->route('category.index')->with('success', 'Kategori berhasil diubah');
    }

    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return back()->with('success', 'Kategori berhasil dihapus');
    }
}
