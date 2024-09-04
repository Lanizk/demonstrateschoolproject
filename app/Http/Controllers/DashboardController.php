<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Models\User;
use App\Models\StudentAddFeesModel;
use App\Models\ExamModel;
use App\Models\ClassModel;
use App\Models\SubjectModel;
use App\Models\AssignClassTeacherModel;
use App\Models\classSubjectModel;


class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['header_title'] = 'Dashboard';
        if (Auth::user()->user_type == 1) {

            $data['getTotalFees']=StudentAddFeesModel::getTotalFees();
            $data['getTotalTodayFees']=StudentAddFeesModel::getTotalTodayfees();
            $data['TotalAdmin']=User::getTotalUser(1);
            $data['TotalTeacher']=User::getTotalUser(2);
            $data['TotalStudent']=User::getTotalUser(3);
            $data['TotalParent']=User::getTotalUser(4);

            $data['TotalExam']=ExamModel::getTotalExam();
            $data['TotalClass']=ClassModel::getTotalClass();
            $data['TotalSubject']=SubjectModel::getTotalSubject();

            return view('admin.admin.dashboard', $data);

        } else if (Auth::user()->user_type == 2) {
           
            $data['TotalStudent']=User::getTeacherStudentCount(Auth::user()->id);
            $data['TotalClass']=AssignClassTeacherModel::getMyClassSubjectGroupCount(Auth::user()->id);
            $data['TotalSubject']=AssignClassTeacherModel::getMyClassSubjectCount(Auth::user()->id);

            return view('teacher.dashboard', $data);

        } else if (Auth::user()->user_type == 3) {

            $data['totalPaidAmount']=StudentAddFeesModel::TotalPaidAmountStudent(Auth::user()->id);
            $data['getTotalTodayFees']=StudentAddFeesModel::getTotalTodayfees();
           

            $data['TotalExam']=ExamModel::getTotalExam();
            $data['TotalClass']=ClassModel::getTotalClass();
            $data['TotalSubject']=classSubjectModel::MySubjectTotal(Auth::user()->class_id);
            return view('student.dashboard', $data);

        } else if (Auth::user()->user_type == 4) {
            return view('parent.dashboard', $data);

        }
    }

}
