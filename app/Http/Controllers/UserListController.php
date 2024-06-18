<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserlistController extends Controller
{
    public function index()
    {
        $userlist = User::all();
        // dd($userlist);
        return view('userlist',['users'=>$userlist]);
    }
}