<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }
    public function Register(Request $request)
    {
        request()->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'phone_number' => 'required|string|max:15',
        'school_name' => 'required|string|max:255',]);


        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->name);
        $user->mobile_number =trim($request->mobile_number);
        $user->user_type = 1;
        $user->save();

        $school = new SchoolModel();
        $school->school_name = trim($request->school_name);
        $school->registered_by = trim($request->name);
        $school->mobile_number =trim($request->mobile_number);
        $school->save();
        // return redirect('admin/admin/list')->with('success', "Admin successfully created");
    }
}
