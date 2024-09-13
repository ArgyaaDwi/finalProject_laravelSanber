<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProfileModel;
class UserModel extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $fillable = ['name', 'username', 'email', 'password'];

    public function profile()
    {
        return $this->hasOne(ProfileModel::class);
    }
}
