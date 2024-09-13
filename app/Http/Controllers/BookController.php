<?php

namespace App\Http\Controllers;

use App\Models\BookModel;
use App\Models\BorrowsModel;
use App\Models\CategoryModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function viewAllBooks()
    {
        $book = BookModel::with('getCategory')->get();
        return view('pages.book.book', compact('book'));
    }

    public function detailBook($id)
    {
        $user = User::all();
        if (Auth::check()) {
            $userId = Auth::id();
            $userName = Auth::user()->name;
        } else {
            return redirect()->route('login');
        }

        $books = BookModel::with('getCategory')->find($id);
        $borrows = BorrowsModel::where('book_id', $id)->with('user')->get();
        return view('pages.book.detail_book', compact('books', 'userId', 'userName', 'user', 'borrows'));
    }

    public function addBook()
    {
        $category = CategoryModel::all();
        return view('pages.book.add_book', compact('category'));
    }
    public function saveBook(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required|integer',
            'category_id' => 'required|integer',
        ]);
        $image = $request->file('image')->store('images', 'public');
        BookModel::create([
            'title' => $validated['title'],
            'summary' => $validated['summary'],
            'image' => basename($image),
            'stock' => $validated['stock'],
            'category_id' => $validated['category_id'],
        ]);
        return redirect('/book')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function editBook($id)
    {
        $books = BookModel::find($id);
        $category = CategoryModel::all();
        return view('pages.book.edit_book', compact('books', 'category'));
    }

    public function updateBook(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stock' => 'required|integer',
            'category_id' => 'required|integer',
        ]);

        $books = BookModel::find($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images', 'public');
            $imageName = basename($image);
        } else {
            $imageName = $books->image;
        }
        $books->update([
            'title' => $validated['title'],
            'summary' => $validated['summary'],
            'image' => $imageName,
            'stock' => $validated['stock'],
            'category_id' => $validated['category_id'],
        ]);

        return redirect('/book')->with('success', 'Buku berhasil diupdate!');
    }

    public function deleteBook($id)
    {
        $book = BookModel::find($id);
        $book->delete();
        return redirect('/book')->with('success', 'Buku berhasil di hapus!');
    }
}
