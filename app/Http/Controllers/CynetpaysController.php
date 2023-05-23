<?php

namespace App\Http\Controllers;


use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Dossier;
use App\Models\Gallery;
use App\Models\Blog;
use App\Models\Note;
use App\Models\Transaction;
use DateTime;

class CynetpaysController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Url de retour
    public function notify(Request $request)
    {
        $user_id =Auth::user()->id;
        $infocandidat = Dossier::where('user_id', $user_id)->first();

        //le nombre de candidat
        $nmb = User::whereIn('role', [1])->get();

        #galleries
        $galleries = Gallery::paginate(3);

        #Ouverture d'un session

        //echo $dt->addMonths(60);                 // 2017-01-31 00:00:00
        //echo $dt->addMonth();                    // 2017-03-03 00:00:00 equivalent of $dt->month($dt->month + 1); so it wraps
        //echo $dt->subMonth();                    // 2017-02-03 00:00:00
        //echo $dt->subMonths(60);

        //$date1 = Carbon::now();
        $date1 = new DateTime("2022-07-23");
        $date2 = new DateTime("2022-08-23");
        //$interval = date_diff($date1, $date2);
        $difference = $date2->diff($date1)->format('%r%m Mois, %r%d Jours');

// This gives a DateInterval instance
        // all blogs
        $blogs = Blog::paginate(4);

        return view('candidats.cynetpays.notify', compact('infocandidat','nmb', 'galleries', 'date1', 'date2', 'difference', 'blogs'));
        
    }
}
