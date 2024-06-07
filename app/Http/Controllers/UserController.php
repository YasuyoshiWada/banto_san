<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('userlist',['users'=>$users]);
    }

    public function setStatus($id)
    {
        $user = User::find($id);
        if($user->status == 'active')
        {
            $user->status = 'inactive';
            $user->save();
        }
        else
        {
            $user->status = 'active';
            $user->save();
        }

        $users = User::paginate(10);
        return redirect()->back();
    }


    public function login()
    {
        return view('auth.login');
    }
}
