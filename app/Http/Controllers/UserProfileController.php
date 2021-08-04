<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function get() {
        $users = User::find(Auth::user()->id);
        return view('user.profile.view', ['users'=>$users]);
    }

    public function edit(){
        $users = User::find(Auth::user()->id);
        return view('user.profile.edit',['users'=>$users]);
    }

    public function editPost(Request $request, $id) {
        $user = User::find(Auth::user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->save();
        session()->flash('message','Your Profile has been updated successfully!!');

        return redirect('user/profile/edit');
    }

}
