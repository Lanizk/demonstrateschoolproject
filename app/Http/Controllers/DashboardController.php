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
use App\Models\StudentAttendanceModel;
use App\Models\HomeworkSubmitModel;
use App\Models\HomeworkModel;

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
            $data['TotalAttendance']=StudentAttendanceModel::getRecordStudentCount(Auth::user()->id);
            $data['TotalHomework']=HomeworkModel::getRecordStudentCount(Auth::user()->class_id,Auth::user()->id);
            $data['TotalSubmittedHomework']=HomeworkSubmitModel::getRecordStudentCount(Auth::user()->id);
            

            $data['TotalExam']=ExamModel::getTotalExam();
            $data['TotalClass']=ClassModel::getTotalClass();
            $data['TotalSubject']=classSubjectModel::MySubjectTotal(Auth::user()->class_id);
            return view('student.dashboard', $data);

        } else if (Auth::user()->user_type == 4) {

            $student_ids=User::getMyStudentIds(Auth::user()->id);
            if(!empty($student_ids))
            {
                $data['totalPaidAmount']=StudentAddFeesModel::TotalPaidAmountStudentParent($student_ids);
                $data['TotalAttendance']=StudentAttendanceModel::getRecordStudentParentCount($student_ids);
                $data['TotalSubmittedHomework']=HomeworkSubmitModel::getRecordStudentParentCount($student_ids);

            }
            else{
                $data['totalPaidAmount']=0;
                $data['TotalAttendance']=0;
                $data['TotalSubmitHomework']=0;
            }
            
            $data['getTotalFees']=StudentAddFeesModel::getTotalFees();
            $data['getTotalTodayFees']=StudentAddFeesModel::getTotalTodayfees();
            $data['TotalStudent']=User::getMyStudentCount(Auth::user()->id);
           

            return view('parent.dashboard', $data);

        }
    }

}
