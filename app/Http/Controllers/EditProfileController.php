<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class EditProfileController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        return view('editProfile', ['user' => $user]);
    }
    
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->employee_number= $request->input('EmployeeNumber');
        $user->name = $request->input('name');
        $user->gender= $request->input('gender');
        $user->email = $request->input('email');
        $user->birthdate = $request->input('birthdate');
        $user->address = $request->input('address');
        $user->update();
        return redirect()->back();
    }
}
