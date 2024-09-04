<?php 
// namespace App\Http\Controllers;
// use App\Services\SmsService;
// use Illuminate\Http\Request; 

// class SmsController extends Controller
// {
//     protected $smsService;

//     public function __construct(SmsService $smsService)
//     {
//         $this->smsService = $smsService;
//     }


//     public function showSms()
//     {
//         return view('admin.SMS.bulk');
//     }

//     public function sendSms(Request $request)
//     {
//         $request->validate([
//             'recipients' => 'required',
//             'message'    => 'required',
//         ]);

//         $recipients = explode(',', $request->recipients);
//         $message = $request->message;

//         $response = $this->smsService->sendBulkSms($recipients, $message);

//         return response()->json($response);
//     }
// }




namespace App\Http\Controllers;

use App\Services\SmsService;
use App\Models\User; // Make sure you have the User model included
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
            'message' => 'required',
        ]);

        $recipients = [];

        // Send to specific user if selected
        if (!empty($request->user_id)) {
            $user = User::find($request->user_id);
            if ($user) {
                $recipients[] = $user->mobile_number; // Assuming you have a phone_number field in your User model
            }
        }

        // Send to multiple user types if selected
        if (!empty($request->message_to)) {
            foreach ($request->message_to as $user_type) {
                $users = User::where('user_type', $user_type)->get(); // Assuming 'user_type' is the field
                foreach ($users as $user) {
                    $recipients[] = $user->mobile_number;
                }
            }
        }

        // Remove duplicate phone numbers
        $recipients = array_unique($recipients);

        // Send SMS to all collected recipients
        $response = $this->smsService->sendBulkSms($recipients, $request->message);

        return redirect()->back()->with('success', "SMS Successfully Sent");
    }
}


