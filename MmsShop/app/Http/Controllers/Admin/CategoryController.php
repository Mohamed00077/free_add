<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        $categories = Category::latest()->get();
        return view('ads.categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom_category' => 'required|string|max:100|unique:categories,nom_category',
        ]);

        Category::create(['nom_category' => $request->nom_category]);

        return redirect()->route('admin.categories.create')->with('success', 'Catégorie ajoutée !');
    }
}