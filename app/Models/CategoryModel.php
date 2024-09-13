<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BookModel;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = ['name', 'category_description'];
    public function getBook()
    {
        return $this->hasMany(BookModel::class);
    }
    // public function getBookByCategory($id){
    //     return $this->hasMany(BookModel::class)->where('category_id', $id);
    // }
    public function getBookByCategory()
    {
        return $this->hasMany(BookModel::class, 'category_id', 'id');
    }
    public $timestamps = true;
}
