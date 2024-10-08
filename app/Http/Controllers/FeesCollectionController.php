<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassModel;
use App\Models\User;
use App\Models\StudentAddFeesModel;
use Auth;

class FeesCollectionController extends Controller
{
    public function collect_fees(Request $request)
    {
        $data['getClass'] = ClassModel::getClass();

        if (!empty($request->all())) {
            $data['getRecord'] = User::getCollectFeeStudent();

        }
        $data['header_title'] = "Collect Fees";
        return view('admin.fees_collection.collect_fees', $data);
    }


    public function collect_fees_add($student_id)
    {
        $data['getFees'] = StudentAddFeesModel::getFees($student_id);
        $getStudent = User::getSingleClass($student_id);
        $data['getStudent'] = $getStudent;
        $data['header_title'] = "Add Collect Fees";
        $data['paid_amount'] = StudentAddFeesModel::getPaidAmount($student_id, $getStudent->class_id);


        return view('admin.fees_collection.add_collect_fees', $data);
    }

    public function collect_fees_report(){
        
            $data['getRecord']=StudentAddFeesModel::getRecord();
            $data['header_title'] = "Fees Report";
            return view('admin.fees_collection.collect_fee_report', $data);
        

    }

    public function collect_fees_insert($student_id, Request $request)
    {
        $getStudent = User::getSingleClass($student_id);
        $paid_amount = StudentAddFeesModel::getPaidAmount($student_id, $getStudent->class_id);

        // if (!empty($request->amount)) {
        if ($request->amount >= 1) {

            $RemainingAmount = $getStudent->amount - $paid_amount;

            if ($RemainingAmount >= $request->amount) {

                $remaining_amount_user = $RemainingAmount - $request->amount;
                $payment = new StudentAddFeesModel;
                $payment->student_id = $student_id;
                $payment->admission_no= $getStudent->admission_no;
                $payment->class_id = $getStudent->class_id;
                $payment->paid_amount = $request->amount;
                $payment->total_amount = $RemainingAmount;
                $payment->remaining_amount = $remaining_amount_user;
                $payment->payment_type = $request->payment_type;
                $payment->remark = $request->remark;
                $payment->is_payment = 1;
                $payment->created_by = Auth::user()->id;
                $payment->save();

                return redirect()->back()->with('success', "Fees Successfully Add");

            } else {
                return redirect()->back()->with('error', "The amount entered is greater than the remaining amount");
            }
        } else {
            return redirect()->back()->with('error', "The amount should be more than Sh 1");
        }
    }


//     public function collect_fees_insert($student_id, Request $request)
// {
//     // Fetch student details
//     $getStudent = User::getSingleClass($student_id);

//     // Fetch the latest fees record for the student
//     $latestFees = StudentAddFeesModel::where('student_id', $student_id)
//         ->orderBy('created_at', 'desc')
//         ->first();

//     // Determine the paid amount so far
//     $paid_amount = $latestFees ? $latestFees->paid_amount : 0;

//     if ($request->amount >= 1) {
//         $RemainingAmount = $getStudent->amount - $paid_amount;

//         if ($RemainingAmount >= $request->amount) {
//             // Calculate the new remaining amount after this payment
//             $remaining_amount_user = $RemainingAmount - $request->amount;

//             if ($latestFees) {
//                 // Update the existing record
//                 $latestFees->paid_amount += $request->amount;
//                 $latestFees->remaining_amount = $RemainingAmount - $request->amount;
//                 $latestFees->payment_type = $request->payment_type;
//                 $latestFees->remark = $request->remark;
//                 $latestFees->is_payment = 1;
//                 $latestFees->created_by = Auth::user()->id;
//                 $latestFees->save();
//             } else {
//                 // Create a new record if no existing record is found
//                 $payment = new StudentAddFeesModel;
//                 $payment->student_id = $student_id;
//                 $payment->admission_no = $getStudent->admission_no;
//                 $payment->class_id = $getStudent->class_id;
//                 $payment->paid_amount = $request->amount;
//                 $payment->total_amount = $getStudent->amount;
//                 $payment->remaining_amount = $getStudent->amount - $request->amount;
//                 $payment->payment_type = $request->payment_type;
//                 $payment->remark = $request->remark;
//                 $payment->is_payment = 1;
//                 $payment->created_by = Auth::user()->id;
//                 $payment->save();
//             }

//             return redirect()->back()->with('success', "Fees Successfully Added");
//         } else {
//             return redirect()->back()->with('error', "The amount entered is greater than the remaining amount");
//         }
//     } else {
//         return redirect()->back()->with('error', "The amount should be more than Sh 1");
//     }
// }




    public function CollectFeesStudents(Request $request)
    {
        $student_id = Auth::user()->id;
        $data['getFees'] = StudentAddFeesModel::getFees($student_id);

        $getStudent = User::getSingleClass($student_id);
        $data['getStudent'] = $getStudent;
        $data['header_title'] = "Add Collect Fees";
        $data['paid_amount'] = StudentAddFeesModel::getPaidAmount(Auth::user()->id, Auth::user()->class_id);


        return view('student.my_fees_collection', $data);
    }


    public function CollectFeesStudentsPayment(Request $request)
    {

        $getStudent = User::getSingleClass(Auth::user()->id);
        $paid_amount = StudentAddFeesModel::getPaidAmount(Auth::user()->id, Auth::user()->class_id);

        if (!empty($request->amount)) {

            $RemainingAmount = $getStudent->amount - $paid_amount;
            $remaining_amount_user = $RemainingAmount - $request->amount;
            $payment = new StudentAddFeesModel;
            $payment->student_id = Auth::user()->id;
            $payment->class_id = Auth::user()->class_id;
            $payment->paid_amount = $request->amount;
            $payment->total_amount = $RemainingAmount;
            $payment->remaining_amount = $remaining_amount_user;
            $payment->payment_type = $request->payment_type;
            $payment->remark = $request->remark;
            $payment->created_by = Auth::user()->id;
            $payment->save();


            if ($RemainingAmount >= $request->amount) {

                if ($request->payment_type == 'Mpesa') {

                } else if ($request->payment_type == 'NationalBank') {

                }


                return redirect()->back()->with('success', "Fees Successfully Add");
            } else {
                return redirect()->back()->with('error', "Your amount is greater than the remaining amount");
            }
        } else {
            return redirect()->back()->with('error', "Add amount more than Sh 1");
        }
    }


}
