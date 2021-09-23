<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::user()) {
            $admins = User::where('admin', '1')->where('id', '!=', auth()->id())->get();
            return response()->json($admins);
        }else{
            $admins = User::get();
            return response()->json($admins);
        }
    }

}
