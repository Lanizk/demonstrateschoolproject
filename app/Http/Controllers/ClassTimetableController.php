<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;

use App\Models\classSubjectModel;
use Illuminate\Http\Request;
use App\Models\week1model;
use App\Models\ClassSubjectTimetable;
use App\Models\SubjectModel;
use App\Models\User;
use Auth;

class ClassTimetableController extends Controller
{
    public function list(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();
        if (!empty($request->class_id)) {
            $data['getSubject'] = classSubjectModel::MySubject($request->class_id);
        }
        $getWeek = week1model::getRecord();
        $week = array();
        foreach ($getWeek as $value) {
            $dataw = array();
            $dataw['week_id'] = $value->id;
            $dataw['week_name'] = $value->name;

            if (!empty($request->class_id) && !empty($request->subject_id)) {
                $ClassSubject = ClassSubjectTimetable::getRecordClassSubject($request->class_id, $request->subject_id, $value->id);

                if (!empty($ClassSubject)) {
                    $dataw['start_time'] = $ClassSubject->start_time;
                    $dataw['end_time'] = $ClassSubject->end_time;
                    $dataw['room_number'] = $ClassSubject->room_number;

                } else {
                    $dataw['start_time'] = '';
                    $dataw['end_time'] = '';
                    $dataw['room_number'] = '';

                }
            } else {
                $dataw['start_time'] = '';
                $dataw['end_time'] = '';
                $dataw['room_number'] = '';

            }
            $week[] = $dataw;

        }
        $data['week'] = $week;

        $data['header_title'] = "Class Timetable List";
        return view('admin.class_timetable.list', $data);
    }

    public function getSubject(Request $request)
    {
        $getSubject = classSubjectModel::MySubject($request->class_id);
        $html = '<option value="">Select </option>';
        foreach ($getSubject as $value) {
            $html .= "<option value='" . $value->subject_id . "'>" . $value->subject_name . "</option>";
        }
        $json['html'] = $html;
        echo json_encode($json);


    }


    public function insert_update(Request $request)
    {
        //dd($request->all());
        ClassSubjectTimetable::where('class_id', '=', $request->class_id)->where('subject_id', '=', $request->subject_id)->delete();

        foreach ($request->timetable as $timetable) {
            if (!empty($timetable['week_id']) && !empty($timetable['start_time']) && !empty($timetable['end_time']) && !empty($timetable['room_number'])) {

                $save = new ClassSubjectTimetable;
                $save->class_id = $request->class_id;
                $save->subject_id = $request->subject_id;
                $save->week_id = $timetable['week_id'];
                $save->start_time = $timetable['start_time'];
                $save->end_time = $timetable['end_time'];
                $save->room_number = $timetable['room_number'];
                $save->save();




            }

        }

        return redirect()->back()->with('success', 'Class Timetable Successfully Saved');
    }

    public function MyTimetable()
    {
        $result = array();
        $getRecord = classSubjectModel::MySubject(Auth::user()->class_id);
        foreach ($getRecord as $value) {
            $dataS['name'] = $value->subject_name;

            $getWeek = week1model::getRecord();
            $week = array();
            foreach ($getWeek as $valueW) {
                $dataw = array();
                $dataw['week_name'] = $valueW->name;
                $ClassSubject = ClassSubjectTimetable::getRecordClassSubject($value->class_id, $value->subject_id, $valueW->id);

                if (!empty($ClassSubject)) {
                    $dataw['start_time'] = $ClassSubject->start_time;
                    $dataw['end_time'] = $ClassSubject->end_time;
                    $dataw['room_number'] = $ClassSubject->room_number;

                } else {
                    $dataw['start_time'] = '';
                    $dataw['end_time'] = '';
                    $dataw['room_number'] = '';
                }
                $week[] = $dataw;

            }
            $dataS['week'] = $week;
            $result[] = $dataS;
        }
        $data['getRecord'] = $result;


        $data['header_title'] = "My Timetable";
        return view('student.my_timetable', $data);
    }

    // public function MyTimetableTeacher($class_id, $subject_id)
    // {

    //     $getWeek = week1model::getRecord();
    //     $week = array();
    //     foreach ($getWeek as $valueW) {
    //         $dataw = array();
    //         $dataw['week_name'] = $valueW->name;
    //         $ClassSubject = ClassSubjectTimetable::getRecordClassSubject($class_id, $subject_id, $valueW->id);

    //         if (!empty($ClassSubject)) {
    //             $dataw['start_time'] = $ClassSubject->start_time;
    //             $dataw['end_time'] = $ClassSubject->end_time;
    //             $dataw['room_number'] = $ClassSubject->room_number;

    //         } else {
    //             $dataw['start_time'] = '';
    //             $dataw['end_time'] = '';
    //             $dataw['room_number'] = '';
    //         }
    //         // $week[] = $dataw;
    //         $result[] = $dataw;

    //     }



    //     $data['getRecord'] = $result;


    //     $data['header_title'] = "My Timetable";
    //     return view('email.teachertimetable', $data);

    // }


    public function TeacherTimetable($class_id, $subject_id)
    {
        $data['getClass'] = classModel::getSingle($class_id);
        $data['getSubject'] = SubjectModel::getSingle($subject_id);

        $getWeek = week1model::getRecord();
        $week = array();
        foreach ($getWeek as $valueW) {
            $dataw = array();
            $dataw['week_name'] = $valueW->name;
            $ClassSubject = ClassSubjectTimetable::getRecordClassSubject($class_id, $subject_id, $valueW->id);

            if (!empty($ClassSubject)) {
                $dataw['start_time'] = $ClassSubject->start_time;
                $dataw['end_time'] = $ClassSubject->end_time;
                $dataw['room_number'] = $ClassSubject->room_number;

            } else {
                $dataw['start_time'] = '';
                $dataw['end_time'] = '';
                $dataw['room_number'] = '';
            }
            // $week[] = $dataw;
            $result[] = $dataw;

        }



        $data['getRecord'] = $result;


        $data['header_title'] = "My Timetable";
        return view('teacher.my_timetable', $data);

    }


    public function MyTimetableParent($class_id, $subject_id, $student_id)
    {
        $data['getClass'] = classModel::getSingle($class_id);
        $data['getSubject'] = SubjectModel::getSingle($subject_id);
        $data['getStudent'] = User::getSingle($student_id);

        $getWeek = week1model::getRecord();
        $week = array();
        foreach ($getWeek as $valueW) {
            $dataw = array();
            $dataw['week_name'] = $valueW->name;
            $ClassSubject = ClassSubjectTimetable::getRecordClassSubject($class_id, $subject_id, $valueW->id);

            if (!empty($ClassSubject)) {
                $dataw['start_time'] = $ClassSubject->start_time;
                $dataw['end_time'] = $ClassSubject->end_time;
                $dataw['room_number'] = $ClassSubject->room_number;

            } else {
                $dataw['start_time'] = '';
                $dataw['end_time'] = '';
                $dataw['room_number'] = '';
            }
            // $week[] = $dataw;
            $result[] = $dataw;

        }



        $data['getRecord'] = $result;


        $data['header_title'] = "My Timetable";
        return view('parent.timetable', $data);

    }








}
