<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class HomeworkSubmitModel extends Model
{
    use HasFactory;
    protected $table='homework_submit';
    static public function getRecord($homework_id){
        $return =HomeworkSubmitModel::select('homework_submit.*','users.name as first_name','users.last_name')
        ->join('users','users.id','=','homework_submit.student_id')
        ->where('homework_submit.homework_id',$homework_id);
        if (!empty(Request::get('first_name'))) {
            $return = $return->where('users.name', 'like', '%' .Request::get('first_name').'%');
        }
        if (!empty(Request::get('last_name'))) {
            $return = $return->where('users.last_name', 'like', '%' .Request::get('last_name').'%');
        }
    if (!empty(Request::get('from_created_date'))) {

            $return = $return->whereDate('homework_submit.created_at','>=',Request::get('from_created_date'));
    }
    if (!empty(Request::get('to_created_date'))) {

        $return = $return->whereDate('homework_submit.created_at','<=',Request::get('to_created_date'));
     }

   

        $return=$return->orderBy('homework_submit.id','desc');
        $return=$return->paginate(20);
        return $return;
}


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
    public function getStudent()
    {
        return $this->belongsTo(Users::class, "student_id");
    }

}
