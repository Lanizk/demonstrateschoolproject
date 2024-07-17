<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;

use App\Models\classSubjectModel;
use Illuminate\Http\Request;
use App\Models\week1model;
use App\Models\ClassSubjectTimetable;

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
            if (!empty($timetable['start_time']) && !empty($timetable['end_time']) && !empty($timetable['room_number'])) {

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






}
