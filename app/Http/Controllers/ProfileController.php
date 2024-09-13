<?php

namespace App\Http\Controllers;
use App\Models\ProfileModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    public function index(){
        $userId = Auth::id();
        $dataProfile = ProfileModel::where('user_id', $userId)->first();
        return view('pages.profile', compact('dataProfile'));
    }

    public function update(Request $request , $id){
        $this->validate($request, [
            'age' => 'required|numeric|min:1|max:100',
            'address' => 'required|string|max:255',

            'bio' => 'required|string|max:255',
        ]);
        $profile = ProfileModel::find($id);
        $profile->age = $request->age;
        $profile->address = $request->address;
        $profile->bio = $request->bio;
        $profile->save();
        return redirect('/profile')->with('success', value: 'Profil berhasil diubah!');
    }
}
