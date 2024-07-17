<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AssignClassTeacherModel;
use Auth;
use App\Models\classSubjectModel;

class AssignClassTeacherController extends Controller
{
    public function list(Request $request)
    {
        $data['getRecord'] = AssignClassTeacherModel::getRecord();
        $data['header_title'] = "Assign Class Teacher";
        return view('admin.assign_class_teacher.list', $data);
    }

    public function add()
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getTeacher'] = User::getTeacherClass();
        $data['header_title'] = "Add New Class";
        return view('admin.assign_class_teacher.add', $data);
    }

    public function insert(Request $request)
    {
        //dd($request->all());

        if (!empty($request->teacher_id)) {
            foreach ($request->teacher_id as $teacher_id) {
                $gettAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id, $teacher_id);

                if (!empty($gettAlreadyFirst)) {
                    $gettAlreadyFirst->status = $request->status;
                    $gettAlreadyFirst->save();
                } else {
                    $save = new AssignClassTeacherModel;
                    $save->class_id = $request->class_id;
                    $save->teacher_id = $teacher_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
            }
            return redirect('admin/assign_class_teacher/list')->with('success', "Assign class to Teacher Successfully");
        } else {
            return redirect()->with('error', 'Due to some error please try again');
        }
    }

    public function edit($id)
    {
        $getRecord = AssignClassTeacherModel::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getAssignTeacherId'] = AssignClassTeacherModel::getAssignTeacherId($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getTeacher'] = User::getTeacherClass();
            $data['header_title'] = "Edit Assign Subject";
            return view('admin.assign_class_teacher.edit', $data);
        } else {
            abort(404);
        }

    }

    public function update($id, Request $request)
    {
        AssignClassTeacherModel::deleteTeacher($request->class_id);


        if (!empty($request->teacher_id)) {
            foreach ($request->teacher_id as $teacher_id) {
                $gettAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id, $teacher_id);

                if (!empty($gettAlreadyFirst)) {
                    $gettAlreadyFirst->status = $request->status;
                    $gettAlreadyFirst->save();
                } else {
                    $save = new AssignClassTeacherModel;
                    $save->class_id = $request->class_id;
                    $save->teacher_id = $teacher_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
            }
        }
        return redirect('admin/assign_class_teacher/list')->with('success', "Assign class to Teacher Successfully");
    }


    public function edit_single($id)
    {
        $getRecord = AssignClassTeacherModel::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getClass'] = ClassModel::getClass();
            $data['getTeacher'] = User::getTeacherClass();
            $data['header_title'] = "Edit Single Teacher";
            return view('email.assigneditteacher', $data);
        } else {
            abort(404);
        }

    }


    public function update_single($id, Request $request)
    {
        // $request->validate([
        //     'class_id' => 'required|integer',
        //     'teacher_id' => 'required|integer',
        //     'status' => 'required|integer'
        // ]);




        $gettAlreadyFirst = AssignClassTeacherModel::getAlreadyFirst($request->class_id, $request->teacher_id);

        if (!empty($gettAlreadyFirst)) {
            $gettAlreadyFirst->status = $request->status;
            $gettAlreadyFirst->save();
            return redirect('admin/assign_class_teacher/list')->with('success', "Status Successfully updated");
        } else {
            $save = AssignClassTeacherModel::getSingle($id);
            $save->class_id = $request->class_id;
            $save->teacher_id = $request->teacher_id;
            $save->status = $request->status;
            // $save->created_by = Auth::user()->id;
            $save->save();
            return redirect('admin/assign_class_teacher/list')->with('success', "Assign class to teacher Successfully updated");
        }


    }

    public function delete($id)
    {
        $save = AssignClassTeacherModel::getSingle($id);
        $save->delete();
        return redirect()->back()->with('success', "Assign class to teacher Successfully deleted");
    }

    public function MyClassSubject()
    {
        $data['getRecord'] = AssignClassTeacherModel::getMyClassSubject(Auth::user()->id);
        $data['header_title'] = "My class & Subject";
        return view('teacher.my_class_subject', $data);
    }


}

