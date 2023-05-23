<?php

namespace App\Http\Controllers\Jury;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Note;
use App\Models\Gallery;
use App\Models\Dossier;
use App\Models\Blog;
use DateTime;

class TbjurysController extends Controller
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
       //mise en place de la pagination des données "->paginate(15);"
        $user = Auth::user()->id;
        //le nombre de condidat inscrire
        $nmb = User::where('role', 1)->get();

         
        //return view('jurys.index', compact('dossiers', 'nmb'));
        //$nmb = User::whereIn('role', [1])->get();
//============================
        #On recupère la liste des dossiers
        $dossier = Dossier::all();
        #all blogs
        $blogs = Blog::paginate(4);
        
        #cette varible de type tableau permet de boucler sur chaque dossiers
        $dossier_notes = [];
        $i = 0;

        #On recupère la note du dossier pour laquelle l'utilisatuer connecté est l'auteur
        foreach($dossier as $items)
        {
            
            $note = Note::where('user_id','=', $user)
            ->where('dossier_id', $items->id)->first();

            #somme note
            $somme = Note::where('user_id','=', $user)
            ->where('dossier_id', $items->id)->sum('note');
            //dd($somme);

            $mail = User::where('id', $items->user_id)->first();
            //dd($mail);

            $dossier_notes[$i]['id'] = $items->id;
            $dossier_notes[$i]['nom'] = $items->nom;
            $dossier_notes[$i]['prenom'] = $items->prenom;
            $dossier_notes[$i]['age'] = $items->age;
            $dossier_notes[$i]['phone'] = $items->phone;
            $dossier_notes[$i]['email'] = $mail->email;
            $dossier_notes[$i]['aetabl'] = $items->aetabl;
            $dossier_notes[$i]['diplome'] = $items->diplome;
            $dossier_notes[$i]['detabl'] = $items->detabl;
            $dossier_notes[$i]['filiere'] = $items->filiere;
            $dossier_notes[$i]['pays'] = $items->pays;
            
            #on vérifie l'existance d'une note pour un dossier donc celui qui la attribuée est le jurys connecté
            if($note)
            {
                $dossier_notes[$i]['note'] = $note->note;
            }
            else{
                $dossier_notes[$i]['note'] = 0;
            }

            $i++;

        }
                
       
        #galleries
        $galleries = Gallery::paginate(3);

        #Date de fermeture d'une session
        $date1 = new DateTime("2022-07-23");
        $date2 = new DateTime("2022-08-23");
        //$interval = date_diff($date1, $date2);
        $difference = $date2->diff($date1)->format('%r%m Mois, %r%d Jours');


       return view('/jurys.index', ['dossier_notes'=>$dossier_notes], compact('nmb','galleries', 'date1', 'date2', 'difference', 'blogs'));
       
        //return view('jurys.index', compact('dossier_notes', 'nmb'));
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
        return view('jurys.show', compact('dossier'));
    }

    // la mise en place de la moyenne ponderée
    public function note(Request $request, $id)
    {
        $user = Auth::User()->id;

        #validate de la note
        $request->validate([
            'note' => ['required'],
        ]);

        #recuperation de la note
        $request = $request->post('note');

        #un dossier doit être noté une seul foi par un Jury
        $note = Note::where('user_id', $user)->where('dossier_id', $id)->first();

        if($note)
        {
            $dossier = Dossier::where('id', $id)->first();
            Alert::warning('Attention!', 'Vous avez déjà attribué une note à ce dossier');
            return view('jurys.show', compact('dossier'));
        }else{
            #save note
            Note::create([
                'note' => $request,
                'user_id' => $user,
                'dossier_id' => $id,
            ]);
            $dossier = Dossier::where('id', $id)->first();
            Alert::success('success!', 'Note attribuée avec success');
            return view('jurys.show', compact('dossier'));
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
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
        return view('jurys.recherche', compact('recherches'));
    }
    public function pbe(){
        return view('/jurys.documentPBE');
    }

    #voir la liste de moyenne de chaque candidats

    public function listemoyenne()
    {
        //mise en place de la pagination des données "->paginate(15);"
        $user = Auth::user()->id;
        //le nombre de condidat inscrire
        $nmb = User::where('role', 1)->get();

         
        //return view('jurys.index', compact('dossiers', 'nmb'));
        //$nmb = User::whereIn('role', [1])->get();
//============================
        #galleries
        $galleries = Gallery::paginate(3);

        #Date de fermeture d'une session
        $date1 = new DateTime("2022-07-23");
        $date2 = new DateTime("2022-08-23");
        //$interval = date_diff($date1, $date2);
        $difference = $date2->diff($date1)->format('%r%m Mois, %r%d Jours');

        #la moyenne et le mail de chaque dossiers
        $test = DB::table('dossiers')
                ->join('users', 'users.id', '=', 'dossiers.user_id')
                ->join('notes', 'notes.dossier_id','=','dossiers.id')
                ->select('dossiers.nom', 'dossiers.prenom', 'dossiers.age', 'users.email', 'dossiers.phone', DB::raw("(avg(notes.note)) as moy"))
                ->groupBy('dossiers.id')
                ->orderBy('moy', 'desc')->paginate(15);
                //dd($test);

       return view('/jurys/listemoyenne', compact('nmb','galleries', 'date1', 'date2', 'difference', 'test'));
       
    }
}
