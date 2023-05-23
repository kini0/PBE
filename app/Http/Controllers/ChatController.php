<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Conversation;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */


    // afficher la liste des employés pour un chat
    public function userlist()
    {
        $userlistes = User::whereIn('role', [2, 3])->where('id', '!=', Auth::user()->id)->get();

        return view('/jurys/chats',compact('userlistes'));
    }
    
    public function send(Request $request, $id){

        $userlistes = User::whereIn('role', [2, 3])->where('id', '!=', Auth::user()->id)->get();
        $recept =User::where('id', $id)->first();
        $emetteur =Auth::user()->id;

        return view('jurys/chat', compact('recept', 'userlistes'));

    }

    public function sav(Request $request, $id)
    {
       
        $emetteur = Auth::User()->id;
        # save du message
            $request->validate([
                'message' => ['required'],

            ]);

        Message::create([
            'message'=> $request->message,
            'id_emett' => $emetteur,
            'id_recept' => $id,
            'conver_id' => $emetteur.'-'.$id,
        ]);
        return back();

        /*
        $conver_exist = Conversation::where('id_emett', $emetteur)->first();*/
        /*$conver_id = Conversation::select('id')
                                    ->where('id_emett', $emetteur)
                                    ->where('id_recept', $id)->first(); //id conversation*/
        //$conver_id = Conversation::where('id_emett', $emetteur)->where('id_recept', $id)->first();
        //dd($conver_id);
        /*if ($conver_exist)
        {
            
            #save du message
            Message::create([
                'message'=> $request->message,
                'id_emett' => $emetteur,
                'id_recept' => $id,
                'conver_id' => Null,//$conver_id,
            ]);
            return back();
        }
        else{
            //create a new conversation
            Conversation::create([
                'id_emett' => $emetteur,
                'id_recept' => $id,
            ]);
            #save du message
            Message::create([
                'message'=> $request->message,
                'id_emett' => $emetteur,
                'id_recept' => $id,
                'conver_id' => Null,//$conver_id,

            ]);
            return back();
        }
        */
    }

    public function store($id)
    {
        $emetteur = Auth::User()->id; // id emetteur du message
        //dd($emetteur);
        $recept = User::where('id', $id)->first(); //id recept du message
        //dd($id);
        /*$conver_id = Conversation::select('id')
                                    ->where('id_emett', $emetteur)
                                    ->where('id_recept', $id)->first(); //id conversation*/
        $userlistes = User::whereIn('role', [2, 3])->where('id', '!=', $emetteur)->get();

        //$conver_id = Conversation::where('id_emett', $emetteur)->where('id_recept', $id)->first();
        //$conver_id= '33';
        //$messages = Message::where('id_emett', $emetteur)->orWhere('id_recept', $id)->get();
        /*$messages = Message::where('id_emett', $emetteur)
                            ->where('id_recept', $id)
                            ->orWhere('conver_id',$conver_id)
                           ->get();*/
        //dd($messages);
        //dd($emetteur);
        $messages = Message::where('conver_id', $emetteur.'-'.$id)
                            ->orWhere('conver_id', $id.'-'.$emetteur)
                            ->orderBy('created_at', 'asc')->get();
        //dd($messages);
        return view('/jurys/chat', compact('messages', 'recept', 'userlistes'));
    }


}
