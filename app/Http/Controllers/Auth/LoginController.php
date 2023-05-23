<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Candidat\DossiersController;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Dossier;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    //protected $redirectTo = RouteServiceProvider::CANDIDAT;
    protected $redirectTo = '/candidat';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    //Mise en place de la fonction de multi authentification

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        //si les information de login sont corrects
        if(auth()->validate(['email' => $input['email'], 'password' => $input['password']])){
            #
            $user = User::where(['email'=>$input['email']])->first();

            //on verifie si le token est vide
            if(empty($user->confirmation_token)){
                if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
                {
                    Session::put([
                        'email'=>$user->email,
                        'user_id'=>$user->id,
                        'user_name'=>$user->name
                    ]);


                    //On verifie si l'user existe dans la base de donnée si oui on le connect
                    if(auth()->user()->confirmation_token == null){
                        //on vérifie si le compte user est activé(son token= null) si oui

                        if(auth()->user()->role == 3){
                            Alert::success('Bonjour!', 'Bienvenue sur votre tableau de bord');
                            return redirect()->route('admin');
                        }

                        if(auth()->user()->role == 2){
                            Alert::success('Bonjour!', 'Bienvenue sur votre tableau de bord');
                            return redirect()->route('jury');
                        }

                        if(auth()->user()->role == 1){
                            //on verifie si l'user a soumi ses dossiers. si oui
                            $user_id = auth()->user()->id; #Auth::user()->id;
                            $dossiers = Dossier::where('user_id', $user_id)->first();
                            //$dossiers = Dossier::where('user_id', auth()->user()->id)->get();

                            if($dossiers){
                                Alert::success('Bonjour!', 'Bienvenue sur votre tableau de bord');
                                return redirect()->route('candidat');
                            }else{

                                Alert::info('Bonjour!', 'Vous devez soumettre votre dossiers');
                                return redirect()->route('soumettre');
                            }
                        }

                    }else{

                        Alert::warning('Bonjour!', 'Votre compte n\'est pas activé! Consulter votre mail pour l\activer ou contactez l\'administrateur');
                        return redirect()->route('login');

                    }

                }else{

                    Alert::warning('Error!', 'L\'adresse e-mail et le mot de passe sont incorrects.');
                    return redirect()->route('register');
                }
            }
            else{

                Alert::warning('Error!', 'Votre compte n\'est pas activé! Consulter votre mail pour l\activer ou contactez l\'administrateur');
                return redirect()->route('login');
            }
        }

        Alert::warning('Error!', 'Nom d\'utilisateur ou mot de passe invalide.');
        return redirect()->route('login');

    }

}
