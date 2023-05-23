<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Immersion;
use Illuminate\Foundation\Auth\RegistersUsers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use App\Notifications\ImmersionNotification;
use Illuminate\Support\Str;

class ImmersionController extends Controller
{
    //
    public function index()
    {
        return view('PIC.immersion_communautaire');
    }

    public function create(Request $request)
    {
        #validation de donnée
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'phone' => ['required'],
            'profession' => ['required'],
            'organisation' => ['required'],
        ]);

        #récuperation des données
        $name = $request->post('name');
        $email = $request->post('email');
        $phone = $request->post('phone');
        $profession = $request->post('profession');
        $organisation = $request->post('organisation');

        #on verifie s'il n'existe pas déjà
        $immersions = Immersion::where('email', $email)->first();

        if($immersions)
        {
            Alert::warning('Attention!', 'ce compte existe Déja!');
            return view('PIC.immersion_communautaire');
        }else{
            
            #save 
            Immersion::create([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'profession' => $profession,
                'organisation' => $organisation,
    
            ]);
    
            Alert::success('SUCCESS!', 'Votre inscription a été bien enregistrée et un mail vous est envoyé. 
                                        L\'équipe de la Fondation Benianh International vous contactera.
                                        Au besoin vous pouvez nous contacter.');
            
            return view('PIC.immersion_communautaire');
        }
        
    }

    public function register(Request $request)
    {
        //dd($request['role']);
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        $user->notify(new ImmersionNotification());
        //$this->guard()->login($user);
        
        if($user){
            Alert::success('Succès!', 'Votre compte à bien été créer.
            un lien de confirmation vous a été envoyé à votre adresse email afin de finaliser votre inscription');
            return redirect('/login');
        }else{
            //return $this->registered($request, $user)?: redirect($this->redirectPath());
            Alert::warning('Error!', 'Error de création de compte.');
            return redirect('/login');
        }

    }

    //mise en place de la fonction de notification Immersion
    public function notification($id, $statut){
        //dd($id, $statut);
        $immersion = Immersion::where('id', $id)->where('statut', $statut)->first();
        //on verifie si le token de l'Immersion n'est pas null et on le met à null
        if($immersion)
        {
            $immersion->update(['statut' => 'actif']);
            
            Alert::success('Succès!', 'Votre compte est activé! Veillez-vous connecter et soumettant vos dossiers complet');
            return redirect()->route('login');
            //return redirect()->route('soumettre')->with('success', 'Votre compte est activé! Veillez soumettre vos dossiers complet');
        } else{
            Alert::warning('Error!', 'Ce lien ne semble plus être valide!');
            return redirect('/');
        }
        
    }
}
