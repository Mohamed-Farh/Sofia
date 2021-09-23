<?php

namespace App\Http\Controllers\Front;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use App\Models\App_Feature;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $app_feature_title = App_Feature::where('status', '0')->where('feature_type', 'مميزات التطبيق')->get();

        return view('home', compact('app_feature_title'));
    }

}
