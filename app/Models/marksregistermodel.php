<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marksregistermodel extends Model
{
    use HasFactory;

    protected $table = 'marks_register';

    static public function CheckAlreadyMark($student_id, $exam_id, $class_id, $subject_id)
    {
        return marksregistermodel::where('student_id', '=', $student_id)
            ->where('exam_id', '=', $exam_id)
            ->where('class_id', '=', $class_id)
            ->where('subject_id', '=', $subject_id)
            ->first();
    }
}
