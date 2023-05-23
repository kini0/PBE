<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $userlistes = User::whereIn('role', [1, 2, 3])->where('id', '!=', Auth::user()->id)->get();

        return view('/admins/chats',compact('userlistes'));
    }

    public function send(Request $request, $id){

        $userlistes = User::whereIn('role', [1, 2, 3])->where('id', '!=', Auth::user()->id)->get();
        $recept =User::where('id', $id)->first();
        $emetteur =Auth::user()->id;

        return view('admins/chat', compact('recept', 'userlistes'));

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
    }

    public function store($id)
    {
        $emetteur = Auth::User()->id; // id emetteur du message

        $recept = User::where('id', $id)->first(); //id recept du message

        $userlistes = User::whereIn('role', [1, 2, 3])->where('id', '!=', $emetteur)->get();

        $messages = Message::where('conver_id', $emetteur.'-'.$id)
                            ->orWhere('conver_id', $id.'-'.$emetteur)
                            ->orderBy('created_at', 'asc')->get();

        return view('/admins/chat', compact('messages', 'recept', 'userlistes'));
    }
}
