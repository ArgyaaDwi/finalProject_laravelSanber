<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserModel;
class ProfileModel extends Model
{
    use HasFactory;
    protected $table = "profile";
    protected $fillable = ['bio', 'age', 'address', 'user_id'];

    public function user()
    {
        return $this->belongsTo(UserModel::class);
    }
}
