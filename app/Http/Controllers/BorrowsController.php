<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BorrowsModel;

class BorrowsController extends Controller
{
    public function index()
    {
        return view('pages.borrows');
    }
    public function storeBorrow(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'book_id' => 'required|integer',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_pengembalian' => 'required|date',
        ]);
        BorrowsModel::create($validated);
        return redirect()->back()->with('success', 'Buku berhasil dipinjam!');
    }
}
