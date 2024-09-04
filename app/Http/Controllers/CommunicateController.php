<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendEmailUserMail;
use App\Models\user;
use Mail;

class CommunicateController extends Controller
{
    public function SendEmail()
    {
            $data['header_title'] = "Send Email";
            return view('admin.communicate.send_email', $data);
    
    }
    public function SearchUser(Request $request){
        $json=array();
        if(!empty($request->search))
        {

            $getUser=User::SearchUser($request->search);
            foreach ($getUser as $value){
                $type='';
                if($value->user_type==1)
                {
                    $type='Admin';
                }
                else if($value->user_type==2)
                {
                    $type='Teacher';
                }

                else if($value->user_type==3)
                {
                    $type='Student';
                }
                else if($value->user_type==4)
                {
                    $type='Parent';
                }
                $name=$value->name.''.$value->last_name.'-'.$type;
                $json[]=['id'=>$value->id,'text'=>$name];
            }
        }

        echo json_encode($json);
    }


    public function SendEmailUser(Request $request)
    {
       
        
      if(!empty($request->user_id))
      {
        $user=User::getSingle($request->user_id);
        $user->send_message=$request->message;
        $user->send_subject=$request->subject;

        Mail::to($user->email)->send(new SendEMailUserMail($user));
            
      }

      if(!empty($request->message_to))
      {
        foreach($request->message_to as $user_type)
        {
            $getUser=User::getUser($user_type);
            foreach($getUser as $user)
            {
                $user->send_message=$request->message;
                $user->send_subject=$request->subject;
                Mail::to($user->email)->send(new SendEMailUserMail($user));
            
            }
        }
      }
      return redirect()->back()->with('success', "Mail Successfully Sent");
    }
}
