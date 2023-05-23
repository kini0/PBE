<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use App\Notifications\EmailNotification;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required'],
            'year' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'year' => $data['year'],
            'password' => Hash::make($data['password']),
            'confirmation_token' => str_replace('/', '', bcrypt(str::random(16))),
        ]);
    }
    //Notification et enregistrement d'un utilisateur

    public function register(Request $request)
    {
        //dd($request['role']);
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        $user->notify(new EmailNotification());
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

    //mise en place de la fonction de notification user
    public function notification($id, $token){
        //dd($id, $token);
        $user = User::where('id', $id)->where('confirmation_token', $token)->first();
        //on verifie si le token de l'user n'est pas null et on le met à null
        if($user)
        {
            $user->update(['confirmation_token' => null]);
            
            Alert::success('Succès!', 'Votre compte est activé! Veillez-vous connecter et soumettant vos dossiers complet');
            return redirect()->route('login');
            //return redirect()->route('soumettre')->with('success', 'Votre compte est activé! Veillez soumettre vos dossiers complet');
        } else{
            Alert::warning('Error!', 'Ce lien ne semble plus être valide!');
            return redirect('/');
        }
        
    }
    
}
