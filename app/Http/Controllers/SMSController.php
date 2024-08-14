<?php
namespace App\Http\Controllers;
use App\Services\SmsService;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    protected $smsService;

    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }


    public function showSms()
    {
        return view('admin.SMS.bulk');
    }

    public function sendSms(Request $request)
    {
        $request->validate([
            'recipients' => 'required',
            'message'    => 'required',
        ]);

        $recipients = explode(',', $request->recipients);
        $message = $request->message;

        $response = $this->smsService->sendBulkSms($recipients, $message);

        return response()->json($response);
    }
}


