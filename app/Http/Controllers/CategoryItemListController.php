<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryItemListController extends Controller
{
    public function index()
    {
        return view('category.itemcategories');
    }
}
