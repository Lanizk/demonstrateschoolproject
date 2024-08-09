<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\C2brequest;


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
        $ConfirmationURL='https://debb-102-219-208-154.ngrok-free.app/payments/confirmation';
        $ValidationURL='https://debb-102-219-208-154.ngrok-free.app/payments/validation';


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
        $c2b->BillRefNumber=$BillRefNumber;
        $c2b->InvoiceNumber=$InvoiceNumber;
        $c2b->OrgAccountBalance=$OrgAccountBalance;
        $c2b->ThirdPartyTransID=$ThirdPartyTransID;
        $c2b->MSISDN=$MSISDN;
        $c2b->FirstName=$FirstName;
        $c2b->MiddleName=$MiddleName;
        $c2b->LastName=$LastName;
        $c2b->save();


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



    }



}
