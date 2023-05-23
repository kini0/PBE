<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gallery;
use App\Models\Immersion;
use DateTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Notifications\ImmersionNotification;
use Illuminate\Foundation\Auth\RegistersUsers;

class ImmersionController extends Controller
{
    //
    public function index()
    {
        return view('PIC.immersion_communautaire');
    }
     #validation de donnée
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required'],
            'profession' => ['required'],
            'organisation' => ['required'],
        ]);
    }
    #récuperation des données create
    protected function create(array $data)
    {
        return Immersion::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'profession' => $data['profession'],
            'organisation' => $data['organisation'],
            'statut' => str_replace('/', '', bcrypt(str::random(16))),
        ]);
    }

    #notification
    public function register(Request $request)
    {
        //dd($request['role']);
        $this->validator($request->all())->validate();

        event(new Registered($immersion = $this->create($request->all())));
        $immersion->notify(new ImmersionNotification());
        //$this->guard()->login($user);
        
        if($immersion){
            Alert::success('SUCCESS!', 'Votre inscription a été bien enregistrée et un mail vous est envoyé. 
                                        L\'équipe de la Fondation Benianh International vous contactera.
                                        Au besoin vous pouvez nous contacter.');
            
            return view('PIC.immersion_communautaire');
        }else{
            Alert::warning('Attention!', 'ce compte existe Déja!');
            return view('PIC.immersion_communautaire');
        }

    }

    //mise en place de la fonction de notification Immersion
    public function notification($id, $statut){
        //dd($id, $statut);
        $immersion = Immersion::where('id', $id)->where('statut', $statut)->first();
        //on verifie si le token de l'Immersion n'est pas null et on le met à null
        if($immersion)
        {
            $immersion->update(['statut' => null]);
            
            Alert::success('Succès!', 'Merci d\'avoir finalisé votre inscription au Programme Immersion Communautaire. Le service PIC vous contactera!');
            //mail à l'administrateur
            $to = 'info@fondationbenianh.org';  
            $subject = 'Nouvelle inscription confirmée au Programme Immersion Communaurtaire !';
            $header = "From:" .$immersion->email."\r\n";
            
            $message = "Nom et Prénom: ". $immersion->name ."\r\n";
			$message .= "Email: " . $immersion->email . "\r\n";
			$message .= "Téléphone: " . $immersion->phone . "\r\n";
			$message .= "Profession: " . $immersion->profession . "\r\n";
			$message .= "Organisation:" . $immersion->organisation ."\r\n";
			

            if (mail($to, $subject, $message, $header)) {
            		//echo "Sent notice to admin.";
            }
            return redirect()->route('immersions');
            //return redirect()->route('soumettre')->with('success', 'Votre compte est activé! Veillez soumettre vos dossiers complet');
        } else{
            Alert::warning('Error!', 'Ce lien ne semble plus être valide!');
            return redirect()->route('immersions');
        }
        
    }

    #La liste des inscrire aux programme Immersion Communautaire
    public function immersion()
    {
        $nmb = User::where('role', 1)->get();
        #galleries
        $galleries = Gallery::paginate(3);
        $date1 = new DateTime("2022-07-23");
        $date2 = new DateTime("2022-08-23");
        //$interval = date_diff($date1, $date2);
        $difference = $date2->diff($date1)->format('%r%m Mois, %r%d Jours');

        $immersions =Immersion::where('statut', NULL)->paginate(20);
        
        return view('admins.PIC', compact('immersions', 'nmb', 'galleries', 'date1', 'date2', 'difference'));

    }
}
