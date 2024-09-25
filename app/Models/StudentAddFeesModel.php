<?php

namespace App\Models;
use Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAddFeesModel extends Model
{
    use HasFactory;
    protected $table = 'student_add_fees';

    protected $fillable = [
        'student_id','admission_no','class_id',
        'paid_amount', 
         'total_amount', 'remaining_amount',
    'created_at', 'payment_type','is_payment'
        
    ];

    static public function getSingle($id)
    {
        return self::find($id);
    }


    static public function getRecord()
    {
        $return =self::select('student_add_fees.*', 'class.name as class_name', 'users.name as created_name',
        'student.name as student_name_first','student.last_name as student_name_last')
        ->join('class', 'class.id', '=', 'student_add_fees.class_id')
        ->join('users as student', 'student.id', '=', 'student_add_fees.student_id')
        ->join('users', 'users.id', '=', 'student_add_fees.created_by')
        ->where('student_add_fees.is_payment', '=', 1);


        if(!empty(Request::get('student_name')))
        {
            $return=$return->where('student.name','like','%'.Request::get('student_name').'%');
        }
        if(!empty(Request::get('student_last_name')))
        {
            $return=$return->where('student.last_name','like','%'.Request::get('student_last_name').'%');
        }
        if(!empty(Request::get('class_id')))
        {
            $return=$return->where('student_add_fees.class_id','=',Request::get('class_id'));
        }
        

        if(!empty(Request::get('created_at')))
        {
            $return=$return->whereDate('student_add_fees.created_at','=',Request::get('created_at'));
        }
        if(!empty(Request::get('payment_type')))
        {
            $return=$return->where('student_add_fees.payment_type','=',Request::get('payment_type'));
        }

       $return=$return ->orderBy('student_add_fees.id','desc')
        ->paginate(50);
        return $return;
    }

    static public function getFees($student_id)
    {
        return self::select('student_add_fees.*', 'class.name as class_name', 'users.name as created_name')
            ->join('class', 'class.id', '=', 'student_add_fees.class_id')
            ->join('users', 'users.id', '=', 'student_add_fees.created_by')
            ->where('student_add_fees.student_id', '=', $student_id)
            ->where('student_add_fees.is_payment', '=', 1)
            ->get();


    }

    static public function getPaidAmount($student_id, $class_id)
    {
        return self::where('student_add_fees.class_id', '=', $class_id)
            ->where('student_add_fees.student_id', '=', $student_id)
            ->where('student_add_fees.is_payment', '=', 1)
            ->sum('student_add_fees.paid_amount');
    }

    static public function getTotalTodayFees()
    {
        return self::where('student_add_fees.is_payment', '=', 1)
            ->whereDate('student_add_fees.created_at', '=', date('Y-m-d'))
            ->sum('student_add_fees.paid_amount');
    }


static public function getTotalFees()
    {
        return self::where('student_add_fees.is_payment', '=', 1)
            ->sum('student_add_fees.paid_amount');
    }


    static public function TotalPaidAmountStudent($student_id)
    {
        return self::where('student_add_fees.is_payment', '=', 1)
        ->where('student_add_fees.student_id','=',$student_id)
            ->sum('student_add_fees.paid_amount');
    }

    static public function TotalPaidAmountStudentParent($student_id)
    {
        return self::where('student_add_fees.is_payment', '=', 1)
        ->whereIn('student_add_fees.student_id',$student_id)
            ->sum('student_add_fees.paid_amount');
    }


}
