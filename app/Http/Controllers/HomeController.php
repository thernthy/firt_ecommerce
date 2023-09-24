<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

use Illuminate\Support\Facades\DB; 
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('front.home');
    }
    public function home()
    {
      $userType = Auth::user()->user_type;
      if ($userType == 1) {
         return view('admin_dashboard.home');
        } else {
          return view('front.home');
        }
    }
}
