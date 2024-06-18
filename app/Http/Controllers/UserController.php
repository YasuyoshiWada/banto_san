<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    public function index()
    {
        return view('userlist');
    }











    public function login()
    {
        return view('auth.login');
    }
}
