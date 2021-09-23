<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use App\Models\Common_Question;
use App\Models\Company_Location;
use App\Models\News;
use App\Models\Privacy_Rule;
use App\Models\Social_Mail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FrontController extends Controller
{
    public function get_location_whats_map()
    {
        $locations = Company_Location::where('status', '0')->get();

        return response()->json($locations);
    }

    //-------------------------------------------------------------------------
    public function get_all_social_media()
    {
        $socials = Social_Mail::where('status', '0')->get();

        return response()->json($socials);
    }

    //-------------------------------------------------------------------------
    public function get_all_common_question()
    {
        $common_questions = Common_Question::where('status', '0')->get();

        return response()->json($common_questions);
    }

    //-------------------------------------------------------------------------
    public function get_aboutus()
    {
        $aboutus = Aboutus::where('status', '0')->get();

        return response()->json($aboutus);
    }
    //-------------------------------------------------------------------------
    public function get_all_privacy()
    {
        $privacy = Privacy_Rule::where('type', 'privacy')->where('status', '0')->get();

        return response()->json($privacy);
    }

    public function get_all_rule()
    {
        $rules = Privacy_Rule::where('type', 'rule')->where('status', '0')->get();

        return response()->json($rules);
    }

    //-------------------------------------------------------------------------
    public function get_all_news()
    {
        $all_news = News::all();

        return response()->json($all_news);
    }

    //-------------------------------------------------------------------------










}
