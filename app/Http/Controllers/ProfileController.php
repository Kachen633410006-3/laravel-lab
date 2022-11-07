<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function postProfile(Request $req) {

        $profile = new Profile;
        $profile->firstname = $req->firstname;
        $profile->lastname = $req->lastname;
        $profile->email = $req->email;
        $profile->mobile = $req->mobile;
        $profile->save();

        return redirect("profile_list"); // redirect to new link
    }

    public function getProfile() {
        $profile_all = Profile::all();
        return view('profile_list', ['profile'=>$profile_all]);
    }

    public function delProfile(Request $req){
        Profile::where('id',$req->id)->delete();
        return "ok";
    }

    public function formEdit($id){
        $profile = Profile::where('id',$id)->first();
        return view('editProfile',['profile'=>$profile]);
    }

    public function updateProfile(Request $req){
        Profile::where('id',$req->id)->update([
        'firstname'=>$req->firstname,
        'lastname'=>$req->lastname,
        'email'=>$req->email,
        'mobile'=>$req->mobile]);

        return redirect('profile_list');
    }
}