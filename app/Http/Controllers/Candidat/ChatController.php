<?php

namespace App\Http\Controllers\Candidat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //afficher la liste des employé de la fondation
    public function userlist()
    {
    	$userlistes = User::whereIn('role', [3])->where('id', '!=', Auth::user()->id)->get();

    	return view('candidats/chats', compact('userlistes'));
    }

    //la fonctionn d'envoie de message de chat des candidat
    public function send(Request $request, $id)
    {
    	$userlistes = User::whereIn('role', [3])->where('id', '!=', Auth::user()->id)->get();
    	$recept = User::where('id', $id)->first();

    	return view('candidat/chat', compact('userlistes', 'recept'));
    }

    //le save d'un message en base de donnée

    public function sav(Request $request, $id)
    {
    	$emetteur = Auth::User()->id;
    	#validation du formulaire
    	$request->validate([
    		'message' => ['required'],
    	]);

    	Message::create([
    		'id_emett' => $emetteur,
    		'id_recept' => $id,
    		'conver_id' => $emetteur.'-'.$id,
    		'message'=> $request->message,
    	]);

    	return back();
    }

    public function store($id)
    {
    	$emetteur = Auth::user()->id;// id emetteur
    	$recept = User::where('id', $id)->first(); //id du recepteur 
    	$userlistes = User::whereIn('role', [3])->where('id', '!=', $emetteur)->get();//la liste des users du chat

    	$messages = Message::where('conver_id', $emetteur.'-'.$id)
    						->orWhere('conver_id', $id.'-'.$emetteur)
    						->orderBy('created_at', 'asc')->get();

    	return view('candidats/chat', compact('emetteur', 'recept', 'userlistes', 'messages'));
    }
}
