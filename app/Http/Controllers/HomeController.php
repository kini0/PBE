<?php

namespace App\Http\Controllers;

use Notification;
use Illuminate\Http\Request;
use App\Notifications\EmailNotification;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Routes;
use App\Models\User;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user()->id;

        $users = User::where('id', $user)->where('role', 1)->first();
         if ($users)
         {
            return redirect()->route('candidat');
         }

         $jury = User::where('id', $user)->where('role', 2)->first();
         if ($jury)
         {
            return redirect()->route('jury');
         }

         $admin = User::where('id', $user)->where('role', 3)->first();
         if ($admin)
         {
            return redirect()->route('admin');
         }

         $presi = User::where('id', $user)->where('role', 4)->first();
         if ($presi)
         {
            return redirect()->route('presi');
         }
        //return view('home');
        
    }
}
