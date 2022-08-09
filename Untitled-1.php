//'diplome' => ['required'],
            'lastname' => ['required'],
            'datenaissance' => ['required'],
            'photo' => ['required', 'string', 'photo', 'mimes:jpg,png,gif,svg', 'max:2048'],
            'phone' => ['required'],


//'lastname' => $data['lastname'],
            'datenaissance' =>$data['datenaissance'],
            'photo' => $data['photo'],
            'diplome' => $data['diplome'],
            'phone' => $data['phone'],


/////==========================================
        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => sha1(time())
          ]);
          Mail::to($user->email)->send(new EmailNotification($user));
        
        return $user;



        //ajout d'image user

public function avatar(Request $request){

    // Handle the user upload of avatar
    if($request->hasFile('photo')){
        $avatar = $request->file('photo');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/photos/' . $filename ) );

        $user = Auth::user();
        $user->photo = $filename;
        $user->save();
    }
}




//Véeification du mail user
    
    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
            $verifyUser->user->verified = 1;
            $verifyUser->user->save();
            $status = "Votre e-mail est vérifié. Vous pouvez maintenant vous connecter.";
            } else {
            $status = "Votre e-mail est déjà vérifié. Vous pouvez maintenant vous connecter.";
            }
        } else {
            return redirect('/login')->with('Attention', "Désolé, votre email ne peut pas être identifié.");
        }
        return redirect('/login')->with('status', $status);
    }

    //on verifie si l'utilisateur a activer son compte
    
    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        return redirect('/login')->with('statut', 'Nous vous avons envoyé un code d\'activation. Vérifiez votre e-mail et cliquez sur le lien pour vérifier.');
    }




    /** code pour activer son compte
        $user = User::where('id', $id)->where('confirmation_token', $token)->first();
        //on verifie si le token de l'user n'est pas null et on le met à null
        if($user)
        {
            $user->update(['confirmation_token' => null]);

        } else{
            return redirect('/')->with('error', 'Ce lien ne semble plus être valide!');
        }*/




        ////configuration du mail trap



        MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=fa7598063670b2
MAIL_PASSWORD=d3592a989b33ad
MAIL_ENCRYPTION=tls