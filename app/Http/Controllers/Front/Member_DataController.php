<?php

namespace App\Http\Controllers\Front;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Member;


use App\Http\Controllers\Controller;
use App\Models\Member_Relation;
use App\Models\My_Notification;
use App\Models\Setting;
use Illuminate\Http\Request;

class Member_DataController extends Controller
{
    use SendsPasswordResetEmails;

    public function show_myprofile_page()
    {
        if( Auth::guard('member')->check() )
        {
            $member_id = Auth::guard('member')->id();
            $member = \App\Models\Member::where('id', $member_id)->first();

            return view('includes.sofia_front.myprofile', compact('member'));

        }else{

            toastr()->error(trans('يرجي تسجيل الدخول اولا'));
            return redirect()->back();
        }
    }


    public function show_forget_password_page()
    {
        return view('includes.sofia_front.forget_password');
    }

    public function show_male_register_page()
    {
        return view('includes.sofia_front.male_register');
    }
    public function show_female_register_page()
    {
        return view('includes.sofia_front.female_register');
    }


    //------------------------------------------------------------------------
    public function member_register(Request $request)
    {
        try{

            do
            {
                $code = mt_rand(1111111111,9999999999);
                $member_code = Member::where('code_no', $code)->get();
            }
            while(!$member_code->isEmpty());

            //To Store One Photo For Home Page
            $file = $request->hasFile('image');

            if ($file != '' ) {
                $file = $request->file('image');
                $file_name = time().'.'.$file->getClientOriginalExtension();

                $resize_image = Image::make($file)->resize(135, 135);
                $resize_image->save('image/members/'.$file_name);

                $save = $file_name;
            }else{
                if( $request->gender == 'ذكر'){
                    $save = 'male_avatar.png';
                }else{
                    $save = 'female_avatar.png';
                }
            }

            $member = new Member();
            $member->image                  = $save;
            $member->code_no                = $code;
            $member->name                   = $request->name;
            $member->email                  = $request->email;
            $member->password               = Hash::make($request['password']);
            $member->gender                 = $request->gender;

            $member->country                = $request->country;
            $member->city                   = $request->city;
            $member->nationality            = $request->nationality;
            $member->dual_nationality       = $request->dual_nationality;

            $member->marriage_type          = $request->marriage_type;
            $member->marital_status         = $request->marital_status;
            $member->age                    = $request->age;
            $member->children_number        = $request->children_number;
            $member->children_with          = $request->children_with;

            $member->weight                 = $request->weight;
            $member->tall                   = $request->tall;
            $member->skin                   = $request->skin;
            $member->body_status            = $request->body_status;
            $member->hair_color             = $request->hair_color;
            $member->listen_music           = $request->listen_music;


            $member->religiosity            = $request->religiosity;
            $member->pray                   = $request->pray;
            $member->smoke                  = $request->smoke;
            $member->beard                  = $request->beard;

            $member->education              = $request->education;
            $member->money_status           = $request->money_status;
            $member->work_field             = $request->work_field;
            $member->work                   = $request->work;
            $member->money_month            = $request->money_month;
            $member->health_status          = $request->health_status;

            $member->partner_description    = str_replace("&nbsp;"," ", ( strip_tags($request->partner_description) ));
            $member->your_description       = str_replace("&nbsp;"," ", ( strip_tags($request->your_description) ));

            $member->full_name              = $request->full_name;
            $member->phone                  = $request->phone;

            $member->save();


            $setting = new Setting;
            $setting->member_id     = $member->id;
            $setting->save();

            toastr()->success('message', 'لقد تم تسجيلك عضو بموقع صوفيا بنجاح .');
            return redirect()->route('login_success_page');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    //------------------------------------------------------------------------
    public function show_login_success_page()
    {
        return view('includes.sofia_front.login_success');
    }

    //---------------------- Show Member Page && Show How visit My Page ----------------------------------------
    public function show_member_details_page($id)
    {
        $member = Member::where('id', $id)->first();

        if( Auth::guard('member')->check() )
        {
            $auth_id = Auth::guard('member')->id();

            $relation = Member_Relation::where(['my_id'=> $auth_id, 'member_id'=> $id ])->first();

            if($relation){
                $relation->update([
                    $relation->visit_profile = '1',
                ]);

                //START------------للحصول علي اشعارات
                $my_settings  = Setting::where('member_id', $id)->first(); //علشان اجيب اعدادات الشخص اللي هتظهر ليه الاشعارات
                $auth_id = Auth::guard('member')->id();  //  علشان اجيب الشخص اللي عامل لوجن
                $myName  = Member::where('id', $auth_id)->first(); //علشان اجيب الشخص اللي عامل لوجن
                $notification = new My_Notification();
                $notification->my_id         = $id;
                $notification->member_id     = $auth_id;
                $notification->type          = 'visit_profile';
                $notification->notifications = 'لقد تم زيارة صفحتك الشخصية بواسطة ' .$myName->name ;

                if($my_settings->show_visit_me == 'on')
                {
                    $notification->status          = true;
                }else{
                    $notification->status          = false;
                }
                $notification->save();
                //END------------للحصول علي اشعارات

                return view('includes.sofia_front.member_details', compact('member'));

            }else{
                $relation = new Member_Relation();
                $relation->member_id        = $id;
                $relation->visit_profile    = '1' ;
                $relation->my_id            = $auth_id;
                $relation->save();

                //START------------للحصول علي اشعارات
                $my_settings  = Setting::where('member_id', $id)->first(); //علشان اجيب اعدادات الشخص اللي هتظهر ليه الاشعارات
                $auth_id = Auth::guard('member')->id();  //  علشان اجيب الشخص اللي عامل لوجن
                $myName  = Member::where('id', $auth_id)->first(); //علشان اجيب الشخص اللي عامل لوجن
                $notification = new My_Notification();
                $notification->my_id         = $id;
                $notification->member_id     = $auth_id;
                $notification->type          = 'visit_profile';
                $notification->notifications = 'لقد تم زيارة صفحتك الشخصية بواسطة ' .$myName->name ;

                if($my_settings->show_visit_me == 'on')
                {
                    $notification->status          = true;
                }else{
                    $notification->status          = false;
                }
                $notification->save();
                //END------------للحصول علي اشعارات

                return view('includes.sofia_front.member_details', compact('member'));
            }

        }else{
            toastr()->error(trans('يرجي تسجيل الدخول اولا حتي تتمكن من التفاعل مع الاعضاء الاخرين'));
            return redirect()->back();
        }

    }

    //------------------------------------------------------------------------
    public function show_edit_myprofile_page()
    {
        if( Auth::guard('member')->check() )
        {
            $member_id = Auth::guard('member')->id();
            $member = \App\Models\Member::where('id', $member_id)->first();

            return view('includes.member_info.edit_profile', compact('member'));

        }else{

            toastr()->error(trans('يرجي تسجيل الدخول اولا'));
            return redirect()->back();
        }
    }
    //------------------------------------------------------------------------
        public function member_update_profile(Request $request)
        {
            // dd('Edit Form');
            try{

                $member = Member::whereId($request->id)->first();

                //To Store One Photo For Home Page
                $file = $request->hasFile('image');

                if ($file != '' ) {
                    $file = $request->file('image');
                    $file_name = time().'.'.$file->getClientOriginalExtension();

                    $resize_image = Image::make($file)->resize(135, 135);
                    $resize_image->save('image/members/'.$file_name);

                    if ( $resize_image->save('image/members/'.$file_name) ){
                        if($member->image != 'avatar.png'){
                            $old_file = $member->image; //get old photo
                            unlink('image/members/'.$old_file);  //delete old photo from folder
                        }
                        $member->image = $file_name;
                        $member->save();
                    }
                }

                if($request->country != null){
                    $country = $request->country;
                }else{
                    $country = $member->country;
                }

                if($request->city != null){
                    $city = $request->city;
                }else{
                    $city = $member->city;
                }

                if($request->nationality != null){
                    $nationality = $request->nationality;
                }else{
                    $nationality = $member->nationality;
                }

                if($request->dual_nationality != null){
                    $dual_nationality = $request->dual_nationality;
                }else{
                    $dual_nationality = $member->dual_nationality;
                }

                $member->update([
                    $member->name                   = $request->name,
                    $member->email                  = $request->email,
                    $member->password               = Hash::make($request['password']),

                    $member->country                = $country,
                    $member->city                   = $city,
                    $member->nationality            = $nationality,
                    $member->dual_nationality       = $dual_nationality,

                    $member->marriage_type          = $request->marriage_type,
                    $member->marital_status         = $request->marital_status,
                    $member->age                    = $request->age,
                    $member->children_number        = $request->children_number,
                    $member->children_with          = $request->children_with,

                    $member->weight                 = $request->weight,
                    $member->tall                   = $request->tall,
                    $member->skin                   = $request->skin,
                    $member->body_status            = $request->body_status,
                    $member->hair_color             = $request->hair_color,
                    $member->listen_music           = $request->listen_music,


                    $member->religiosity            = $request->religiosity,
                    $member->pray                   = $request->pray,
                    $member->smoke                  = $request->smoke,
                    $member->beard                  = $request->beard,

                    $member->education              = $request->education,
                    $member->money_status           = $request->money_status,
                    $member->work_field             = $request->work_field,
                    $member->work                   = $request->work,
                    $member->money_month            = $request->money_month,
                    $member->health_status          = $request->health_status,

                    $member->partner_description    = str_replace("&nbsp;"," ", ( strip_tags($request->partner_description) )),
                    $member->your_description       = str_replace("&nbsp;"," ", ( strip_tags($request->your_description) )),

                    $member->full_name              = $request->full_name,
                    $member->phone                  = $request->phone,
                ]);

                toastr()->success('message', 'لقد تم تحديث بياناتكم بموقع صوفيا بنجاح .');
                return view('includes.sofia_front.myprofile', compact('member'));
            }
            catch (\Exception $e){
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }

        }




    //------------------------------------------------------------------------
    //------------------------------------------------------------------------
    public function show_mysettings()
    {
        if( Auth::guard('member')->check() )
        {
            $member_id = Auth::guard('member')->id();
            $member = \App\Models\Member::where('id', $member_id)->first();
            $mysettings = \App\Models\Setting::where('member_id', $member_id)->first();

            return view('includes.member_info.mysettings', compact('member_id', 'mysettings'));

        }else{

            toastr()->error(trans('يرجي تسجيل الدخول اولا'));
            return redirect()->back();
        }
    }

    public function update_mysettings(Request $request)
    {
        // dd($request);
        // try{

            if( Auth::guard('member')->check() )
            {
                $member_id = Auth::guard('member')->id();
                $settings = Setting::whereMember_id($member_id)->first();


                if($request->show_who_care_me == "on")
                    {  $show_who_care_me = "on" ; }
                else
                    {  $show_who_care_me = "off" ; }

                if($request->show_visit_me == "on")
                    {  $show_visit_me = "on" ; }
                else
                    {  $show_visit_me = "off" ; }

                if($request->show_block_me == "on")
                    {  $show_block_me = "on" ; }
                else
                    {  $show_block_me = "off" ; }

                if($request->show_unblock_me == "on")
                    {  $show_unblock_me = "on" ; }
                else
                    {  $show_unblock_me = "off" ; }

                if($request->show_new_messages == "on")
                    {  $show_new_messages = "on" ; }
                else
                    {  $show_new_messages = "off" ; }

                if($request->show_success_stories == "on")
                    {  $show_success_stories = "on" ; }
                else
                    {  $show_success_stories = "off" ; }

                if($request->email_send == "on")
                    {  $email_send = "on" ; }
                else
                    {  $email_send = "off" ; }

                $settings->update([
                    $settings->who_can_text_me          = $request->who_can_text_me,
                    $settings->nationality_can_text_me  = $request->nationality_can_text_me,
                    $settings->age_can_text_me          = $request->age_can_text_me,

                    $settings->show_who_care_me         = $show_who_care_me,
                    $settings->show_visit_me            = $show_visit_me,
                    $settings->show_block_me            = $show_block_me,
                    $settings->show_unblock_me          = $show_unblock_me,
                    $settings->show_new_messages        = $show_new_messages,
                    $settings->show_success_stories     = $show_success_stories,
                    $settings->email_send               = $email_send,

                ]);
                toastr()->success('message', 'لقد تم تحديث بياناتكم بموقع صوفيا بنجاح .');
                return redirect()->back();

            }else{

                toastr()->error(trans('يرجي تسجيل الدخول اولا'));
                return redirect()->back();
            }
        // }
        // catch (\Exception $e){
        //     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        // }

    }
}
