<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;



class ItemAddController extends Controller
{
    public function index()
    {
        return view('item-add');
    }
}
