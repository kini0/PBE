<?php

namespace App\Http\Controllers\Admin;

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
use DateTime;

class TbadminsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$dossiers = Dossier::all();
        //$dossiers = Dossier::paginate(15); //mise en place de la pagination des données
        //le nomnbre de candidat
        $nmb = User::where('role', 1)->get();
        #galleries
        $galleries = Gallery::paginate(3);

        #all blogs
        $blogs = Blog::paginate(4);

        $dossiers = User::join('dossiers', 'dossiers.user_id', '=', 'users.id')->paginate(15);

        #date de fermeture de la session
        $date1 = new DateTime("2022-07-23");
        $date2 = new DateTime("2022-08-23");
        //$interval = date_diff($date1, $date2);
        $difference = $date2->diff($date1)->format('%r%m Mois, %r%d Jours');

        return view('admins.index', compact('dossiers', 'nmb', 'galleries', 'date1', 'date2', 'difference', 'blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dossier = Dossier::where('id', $id)->first();
        return view('admins.show', compact('dossier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //========================================
    //création de ma fonction de recherche d'un candidate
    public function recherche(Request $request){

        $nom = $request->get('nom');

        $str = preg_replace('/[^A-Za-z0-9. -]/', '', $nom);
        $str = preg_replace('/  */', '-', $str);
        $str = preg_replace('/\\s+/', '-', $str);
        $str = preg_replace('/\\s!/', '-', $str);
        $recherches = Dossier::where('nom', $str)->get();
        return view('admins.recherche', compact('recherches'));
    }
    //Les documents à fournir pour PBE

    public function pbe(){
        return view('/admins.documentPBE');
    }

    #la liste des moyenne de chaque candidat
    public function listemoyenne()
    {
        //$dossiers = Dossier::all();
        //$dossiers = Dossier::paginate(15); //mise en place de la pagination des données
        //le nomnbre de candidat
        $nmb = User::where('role', 1)->get();
        #galleries
        $galleries = Gallery::paginate(3);

       // $dossiers = User::join('dossiers', 'dossiers.user_id', '=', 'users.id')->paginate(15); la

        #date de fermeture de la session
        $date1 = new DateTime("2022-07-23");
        $date2 = new DateTime("2022-08-23");
        //$interval = date_diff($date1, $date2);
        $difference = $date2->diff($date1)->format('%r%m Mois, %r%d Jours');

        #la moyenne et le mail de chaque dossiers
        $test = DB::table('dossiers')
                ->join('users', 'users.id', '=', 'dossiers.user_id')
                ->join('notes', 'notes.dossier_id','=','dossiers.id')
                ->select('dossiers.nom', 'dossiers.prenom', 'dossiers.age', 'users.email', 'dossiers.phone',DB::raw("(avg(notes.note)) as moy"))
                ->groupBy('dossiers.id')
                ->orderBy('moy', 'desc')->paginate(15);
                //dd($test);

        return view('admins.listemoyenne', compact('nmb', 'galleries', 'date1', 'date2', 'difference', 'test'));
    }
}
