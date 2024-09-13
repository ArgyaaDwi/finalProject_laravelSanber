<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowsModel extends Model
{
    use HasFactory;

    protected $table = "borrows";
    protected $fillable = ['user_id', 'book_id', 'tanggal_peminjaman', 'tanggal_pengembalian', 'created_at', 'updated_at'];
    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }
    public function book()
    {
        return $this->belongsTo(BookModel::class, 'book_id', 'id');
    }
}
