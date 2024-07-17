<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['header_title'] = 'Dashboard';
        if (Auth::user()->user_type == 1) {
            return view('admin.admin.dashboard', $data);

        } else if (Auth::user()->user_type == 2) {
            return view('teacher.dashboard', $data);

        } else if (Auth::user()->user_type == 3) {
            return view('student.dashboard', $data);

        } else if (Auth::user()->user_type == 4) {
            return view('parent.dashboard', $data);

        }
    }

}
