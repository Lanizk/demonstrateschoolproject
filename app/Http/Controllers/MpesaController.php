<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\C2brequest;
use App\Models\StudentAddFeesModel;
use App\Models\User;

class MpesaController extends Controller
{

    public function token(){
        $consumerKey='OJp3VgzAJ3VLxicvc2GOLVil1oABSHmCnPtepKpG28JrgXO1';
        $consumerSecret='bZIBEwEVpTaQGLcmmdulAuu9iPJmbDaC7Y3yWdt58MHQLQN2B9Ds5vctDlGTV0BA';
        $url='https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';


        $response=Http::withBasicAuth($consumerKey,$consumerSecret)->get($url);
        //$accessToken = $response->json()['access_token'];
        return $response['access_token'];
    }

    public function lipNaMpesaPassword(){
        $timestamp=Carbon::rawParse('now')->format('YmdHms');

    }

    public function registerUrl(){
        $accessToken=$this->token();
        $url='https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';
        $ShortCode=600998;
        $ResponseType='completed';
        $ConfirmationURL='https://6365-102-219-210-106.ngrok-free.app/payments/confirmation';
        $ValidationURL='https://6365-102-219-210-106.ngrok-free.app/payments/validation';


        $response=Http::withToken($accessToken)->post($url,[
            'ShortCode'=>$ShortCode,
            'ResponseType'=>$ResponseType,
            'ConfirmationURL'=>$ConfirmationURL,
            'ValidationURL'=>$ValidationURL,
        ]);

        return $response;

    }


    public function Simulate(){

        $accessToken=$this->token();
        $url='https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';
        $ShortCode=600998;
        $CommandID='CustomerPayBillOnline';
        $Amount=1;
        $Msisdn=254708374149;
        $BillRefNumber='0000';
        $response=Http::withToken($accessToken)->post($url,[
            'ShortCode'=>$ShortCode,
            'CommandID'=>$CommandID,
            'Amount'=>$Amount,
            'Msisdn'=>$Msisdn,
            'BillRefNumber'=>$BillRefNumber,
        ]);
        return $response;

    }


    public function Validation(){
        $data=file_get_contents('php://input');
        Storage::disk('local')->put('validation.txt',$data);



        $response=json_decode($data);
        $TransactionType=$response->TransactionType;
        $TransID=$response->TransID;
        $TransTime=$response->TransTime;
        $TransAmount=$response->TransAmount;
        $BusinessShortCode=$response->BusinessShortCode;
        $BillRefNumber=$response->BillRefNumber;
        $InvoiceNumber=$response->InvoiceNumber;
        $OrgAccountBalance=$response->OrgAccountBalance;
        $ThirdPartyTransID=$response->ThirdPartyTransID;
        $MSISDN=$response->MSISDN;
        $FirstName=$response->FirstName;
        $MiddleName=$response->MiddleName;
        $LastName=$response->LastName;


        $c2b=new C2brequest;
        $c2b->TransactionType=$TransactionType;
        $c2b->TransID=$TransID;
        $c2b->TransTime=$TransTime;
        $c2b->TransAmount=$TransAmount;
        $c2b->BusinessShortCode=$BusinessShortCode;
        $c2b->admission_no=$BillRefNumber;
        $c2b->InvoiceNumber=$InvoiceNumber;
        $c2b->OrgAccountBalance=$OrgAccountBalance;
        $c2b->ThirdPartyTransID=$ThirdPartyTransID;
        $c2b->MSISDN=$MSISDN;
        $c2b->FirstName=$FirstName;
        $c2b->MiddleName=$MiddleName;
        $c2b->LastName=$LastName;
        $c2b->save();



        $student = User::where('admission_no', $BillRefNumber)->first();

        if ($student) {
            // Find the corresponding financial record
            $studentFees = StudentAddFeesModel::where('student_id', $student->id)->first();
    
            if ($studentFees) {
                // Update the student's financial record
                $studentFees->amount_paid += $TransAmount;
                $studentFees->save();
            } else {
                // Handle the case where no financial record exists (optional)
                // Example: create a new financial record if it doesn't exist
                StudentAddFeesModel::create([
                    'student_id' => $student->id,
                    'paid_amount' => $TransAmount,
                    // Add other necessary fields
                ]);
            }
        } else {
            // Handle case where student is not found
            // Optional: Log or notify about the unmatched admission number
        }


        //validation logic
        return response()->json([
            'ResultCode'=>0,
            'ResultDesc'=>'Accepted',
        ]);

        // return response()->json([
        //         'ResultCode'=>'C2B0011',
        //          'ResultDesc'=>'Rejeted',
        //     ])



    }

    public function Confirmation(){
        $data=file_get_contents('php://input');
        Storage::disk('local')->put('validation.txt',$data);

 return response()->json([
                'ResultCode'=>'C2B0011',
                 'ResultDesc'=>'Rejeted',
 ]);


    }



}
