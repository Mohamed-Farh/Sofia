<?php

namespace App\Http\Controllers\Front;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Member_Inbox;
use App\Models\Member_Relation;
use App\Models\My_Notification;
use App\Models\Setting;
use Illuminate\Http\Request;

class Member_RelationController extends Controller
{
    public function member_message_to_member(Request $request)
    {
        try{
            if( Auth::guard('member')->check() )
            {
                $auth_id = Auth::guard('member')->id();
                if( Member_Relation::where(['my_id'=> $request->member_id, 'member_id'=> $auth_id, 'ignore_list'=> '0' ])->first() )
                {
                    $member_inbox = new Member_Inbox();
                    $member_inbox->member_id          = $request->member_id;
                    $member_inbox->subject            = $request->subject;
                    $member_inbox->message            = $request->message;
                    $member_inbox->sender_member_id   = Auth::guard('member')->id();
                    $member_inbox->save();

                    //START------------للحصول علي اشعارات
                    $my_settings  = Setting::where('member_id', $request->member_id)->first(); //علشان اجيب اعدادات الشخص اللي هتظهر ليه الاشعارات
                    $auth_id = Auth::guard('member')->id();  //  علشان اجيب الشخص اللي عامل لوجن
                    $myName  = Member::where('id', $auth_id)->first(); //علشان اجيب الشخص اللي عامل لوجن
                    $notification = new My_Notification();
                    $notification->my_id         = $request->member_id;
                    $notification->member_id     = $auth_id;
                    $notification->type          = 'send_message';
                    $notification->notifications = 'لقد تم ارسال رسالة الي صفحتك الشخصية بواسطة ' .$myName->name ;

                    if($my_settings->show_new_messages == 'on')
                    {
                        $notification->status          = true;
                    }else{
                        $notification->status          = false;
                    }
                    $notification->save();
                    //END------------للحصول علي اشعارات

                    toastr()->success(trans('تم ارسال رسالتك بنجاح'));
                    return redirect()->back();
                }else{
                    toastr()->error(trans('نأسف لعدم ارسال رسالتك و ذلك لكونك من الاعضاء المحظورين لدي هذا الشخص'));
                    return redirect()->back();
                }


            }else{
                toastr()->error(trans('يرجي تسجيل الدخول حتي تتمكن من التواصل مع بقية الاعضاء بالموقع'));
                return redirect()->back();
            }

        }
       catch (\Exception $e){
           return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       }
    }


    public function show_my_data_page(Request $request)
    {
        try{
            if( Auth::guard('member')->check() )
            {
                $auth_id = Auth::guard('member')->id();

                $member = Member::where('id', $auth_id )->first();

                return view('includes.member_info.my_data', compact('member'));

            }else{
                toastr()->error(trans('يرجي تسجيل الدخول حتي تتمكن من الدخول الي بياناتك'));
                return redirect()->back();
            }

        }
       catch (\Exception $e){
           return redirect()->back()->withErrors(['error' => $e->getMessage()]);
       }
    }

    //------------------------------------------------------------------------
    public function show_my_inbox_message_page()
    {
        try{
            if (Auth::guard('member')->check())
            {
                $auth_id = Auth::guard('member')->id();

                $messages = Member_Inbox::where('member_id', $auth_id )->where('show', '0')->orderBy('id', 'desc')->paginate(5);

                $messages_count = count($messages);

                return view('includes.member_info.my_inbox_message', compact('messages', 'messages_count'));

            }else{
                toastr()->error(trans('يرجي تسجيل الدخول حتي تتمكن من الدخول الي بياناتك'));
                return view('home');
            }

        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



}
