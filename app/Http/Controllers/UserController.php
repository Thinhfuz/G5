<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    function list()
    {
        $data=User::all();
        return view('admin/user/list',['users'=>$data]);
    }

    function delete($id)
    {
        $data=User::find($id);
        $data->delete();
        return redirect('admin/user/list');
    }
}
