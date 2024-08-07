<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Mail;
use Str;

class AuthController extends Controller
{
    public function login()
    {
        if (!empty(Auth::check())) {
            if (Auth::user()->user_type == 1) {
                return redirect('admin/dashboard');

            } else if (Auth::user()->user_type == 2) {
                return redirect('teacher/dashboard');

            } else if (Auth::user()->user_type == 3) {
                return redirect('student/dashboard');

            } else if (Auth::user()->user_type == 4) {
                return redirect('parent/dashboard');

            }

            //return redirect('admin/dashboard');
        }
        //dd(Hash::make(123456));

        return view('auth.login');
    }

    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;
        //dd($request->all());
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {

            if (Auth::user()->user_type == 1) {
                return redirect('admin/dashboard');

            } else if (Auth::user()->user_type == 2) {
                return redirect('teacher/dashboard');

            } else if (Auth::user()->user_type == 3) {
                return redirect('student/dashboard');

            } else if (Auth::user()->user_type == 4) {
                return redirect('parent/dashboard');

            }

        } else {
            return redirect()->back()->with('error', 'Please enter correct email and password');
        }
    }

    public function forgotpassword()
    {
        return view('auth.forgot');

    }

    public function postForgotPassword(Request $request)
    {
        $user = User::getEmailSingle($request->email);

        if (!empty($user)) {
            $user->remember_token == Str::random(30);
            $user->save();
            mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success', "Please check your email and reset your password");

        } else {
            return redirect()->back()->with('error', "Email not found in the system");
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }
}
