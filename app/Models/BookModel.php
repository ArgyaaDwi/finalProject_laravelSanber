<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryModel;

class BookModel extends Model
{
    use HasFactory;

    protected $table = "books";
    protected $fillable = ['title', 'summary', 'image', 'stock', 'category_id', 'created_at', 'updated_at'];
    public function getCategory()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id', 'id');
    }
    public function getBorrow()
    {
        return $this->hasMany(BorrowsModel::class, 'book_id', 'id');
    }
}
