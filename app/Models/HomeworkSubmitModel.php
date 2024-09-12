<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class HomeworkSubmitModel extends Model
{
    use HasFactory;
    protected $table='homework_submit';
    static public function getRecordStudent($student_id){
        $return =HomeworkSubmitModel::select('homework_submit.*','class.name as class_name',
        'subject.name as subject_name')
        ->join('homework','homework.id','=','homework_submit.homework_id')
        ->join('class','class.id','=','homework.class_id')
        ->join('subject','subject.id','=','homework.subject_id')
        ->where('homework_submit.student_id',$student_id);

        if (!empty(Request::get('class_name'))) {

                $return = $return->where('class.name', 'like', '%' . Request::get('class_name') . '%');
        }
        if (!empty(Request::get('subject_name'))) {
            $return = $return->where('subject.name', 'like', '%' .Request::get('subject_name').'%');
        }

        $return=$return->orderBy('homework_submit.id','desc')
        ->paginate(20);

        return $return;
    }
    public function getDocument()
    {
       if(!empty($this->document) && file_exists('upload/homework/'.$this->document))
       {
           return url('upload/homework/'.$this->document);
       }
       else{
           return "";
       }
    }

    public function getHomework()
    {
        return $this->belongsTo(HomeworkModel::class, "homework_id");
    }

}
