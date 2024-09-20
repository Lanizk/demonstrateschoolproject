<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\classSubjectModel;
use App\Models\SubjectModel;
use App\Models\ClassModel;
use Auth;


class ClassSubjectController extends Controller
{
    public function list(Request $request)
    {
        $data['getRecord'] = classSubjectModel::getRecord();
        $data['header_title'] = "Subject Assign List";
        return view('admin.assign_subject.list', $data);

    }

    public function add(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        $data['getSubject'] = SubjectModel::getSubject();
        $data['header_title'] = "Subject Assign Add";
        return view('admin.assign_subject.add', $data);

    }

    public function insert(Request $request)
    {
        if (!empty($request->subject_id)) {
            foreach ($request->subject_id as $subject_id) {
                $gettAlreadyFirst = classSubjectModel::getAlreadyFirst($request->class_id, $subject_id);

                if (!empty($gettAlreadyFirst)) {
                    $save->status = $request->status;
                    $save->save();
                } else {
                    $save = new classSubjectModel;
                    $save->class_id = $request->class_id;
                    $save->subject_id = $subject_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
            }
            return redirect('admin/assign_subject/list')->with('success', "Subject Successfully Assigned to class");
        } else {
            return redirect()->with('error', 'Due to some error please try again');
        }
    }

    public function consent($id)
    {
        $getRecord = classSubjectModel::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getAssignSubjectId'] = classSubjectModel::getAssignSubjectId($getRecord->class_id);
            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = SubjectModel::getSubject();
            $data['header_title'] = "Edit Assign Subject";
            return view('admin.assign_subject.add', $data);
        } else {
            abort(404);
        }

    }

    public function update(Request $request)
    {
        classSubjectModel::deleteSubject($request->class_id);

        if (!empty($request->subject_id)) {
            foreach ($request->subject_id as $subject_id) {
                $gettAlreadyFirst = classSubjectModel::getAlreadyFirst($request->class_id, $subject_id);

                if (!empty($gettAlreadyFirst)) {
                    $save->status = $request->status;
                    $save->save();
                } else {
                    $save = new classSubjectModel;
                    $save->class_id = $request->class_id;
                    $save->subject_id = $subject_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
            }
            return redirect('admin/assign_subject/list')->with('success', "Subject Successfully Assigned to class");
        }
    }

    public function delete($id)
    {
        $save = classSubjectModel::getSingle($id);
        $save->is_delete = 1;
        $save->save();

        return redirect()->back()->with('success', 'Record Successfully Deleted');

    }


    public function single($id)
    {
        $getRecord = classSubjectModel::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getClass'] = ClassModel::getClass();
            $data['getSubject'] = SubjectModel::getSubject();
            $data['header_title'] = "Edit Assign Subject";
            return view('email.assign_shida', $data);
        } else {
            abort(404);
        }

    }

    public function update_single($id, Request $request)
    {

        

        $gettAlreadyFirst = classSubjectModel::getAlreadyFirst($request->class_id, $request->subject_id);
        
        if (!empty($gettAlreadyFirst)) {
            $gettAlreadyFirst->status = $request->status;
            $gettAlreadyFirst->save();
            return redirect('admin/assign_subject/list')->with('success', "Status Successfully updated");
        } else {
            $save = new classSubjectModel;
            $save->class_id = $request->class_id;
            $save->subject_id = $request->subject_id;
            $save->status = $request->status;
            $save->created_by = Auth::user()->id;
            $save->save();
            return redirect('admin/assign_subject/list')->with('success', "Subject Successfully Assigned to class");
        }


    }
    // public function update(Request $request)
    // {
    //     classSubjectModel::deleteSubject($request->class_id);

    //     if (!empty($request->subject_id)) {
    //         foreach ($request->subject_id as $subject_id) {
    //             $gettAlreadyFirst = classSubjectModel::getAlreadyFirst($request->class_id, $subject_id);

    //             if (!empty($gettAlreadyFirst)) {
    //                 $save->status = $request->status;
    //                 $save->save();
    //             } else {
    //                 $save = new classSubjectModel;
    //                 $save->class_id = $request->class_id;
    //                 $save->subject_id = $subject_id;
    //                 $save->status = $request->status;
    //                 $save->created_by = Auth::user()->id;
    //                 $save->save();
    //             }
    //         }
    //         return redirect('admin/assign_subject/list')->with('success', "Subject Successfully Assigned to class");
    //     }
    // }
}






