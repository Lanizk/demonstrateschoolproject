<?php

namespace App\Http\Controllers;

use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Auth;
use App\Models\classSubjectModel;
use App\Models\User;

class SubjectController extends Controller
{
    public function list()
    {
        $data['getRecord'] = SubjectModel::getRecord();
        $data['header_title'] = "Subject List";
        return view('admin.subject.list', $data);
    }

    public function add()
    {
        $data['header_title'] = "Add Subject";
        return view('admin.subject.add', $data);
    }

    public function insert(Request $request)
    {
        $save = new SubjectModel;
        $save->name = trim($request->name);
        $save->type = trim($request->type);
        $save->status = trim($request->status);
        $save->created_by = Auth::user()->id;
        $save->save();

        // dd($request->all());

        return redirect('admin/subject/list')->with('success', "Subject sucessfully created");
    }

    public function consent($id)
    {
        $data['getRecord'] = SubjectModel::getSingle($id);
        if (!empty($data['getRecord'])) {
            $data['header_title'] = "Edit Subject";
            return view('admin.subject.edit', $data);
        } else {
            abort(404);
        }

    }

    public function update($id, REquest $request)
    {
        $save = SubjectModel::getSingle($id);
        $save->name = trim($request->name);
        $save->type = trim($request->type);
        $save->status = trim($request->status);

        $save->save();
        return redirect('admin/subject/list')->with('success', "Class successfully updated");

    }

    public function delete($id)
    {
        $save = SubjectModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();
        return redirect()->back()->with('success', "Class successfully deleted");

    }


    public function MySubject()
    {
        //dd(Auth::User()->class_id);
        $data['getRecord'] = classSubjectModel::MySubject(Auth::user()->class_id);
        $data['header_title'] = "My Subject";
        return view('student.my_subject', $data);
    }


    public function ParentStudentSubject($student_id)
    {
        $user = User::getSingle($student_id);
        $data['getUser'] = $user;
        $data['getRecord'] = classSubjectModel::MySubject($user->class_id);
        $data['header_title'] = "Student Subject";
        return view('email.my_student_subject', $data);

    }
}
