<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function viewAllCategories()
    {
        $category = CategoryModel::all();
        return view('pages.category.category', compact('category'));
    }
    public function addCategory()
    {
        return view('pages.category.add_category');
    }

    public function saveCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_description' => 'required|string',
        ]);
        CategoryModel::create([
            'name' => $request->name,
            'category_description' => $request->category_description,
        ]);
        return redirect('/category')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function detailCategory($id)
    {
        $categories = CategoryModel::find($id);
        $books = $categories->getBookByCategory()->get();
        return view('pages.category.detail_category', compact('categories', 'books'));
    }

    public function editCategory($id)
    {
        $categories = CategoryModel::find($id);
        return view('pages.category.edit_category', compact('categories'));
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_description' => 'required|string',
        ]);
        $categories = CategoryModel::find($id);
        $categories->update([
            'name' => $request->name,
            'category_description' => $request->category_description,
        ]);
        return redirect('/category')->with('success', 'Kategori berhasil diupdate!');
    }

    public function deleteCategory($id)
    {
        $categories = CategoryModel::find($id);
        $categories->delete();
        return redirect('/category')->with('success', 'Kategori berhasil dihapus!');
    }
}
