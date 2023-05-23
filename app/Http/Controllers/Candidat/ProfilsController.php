<?php

namespace App\Http\Controllers\Candidat;
use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dossier;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfilsController extends Controller
{
    //
    public function index()
    {
        $user_id =Auth::user()->id;
        $infocandidat = Dossier::where('user_id', $user_id)->first();

        return view('candidats/profil', compact('infocandidat'));
    }


    Public function infoprofile(Request $request, $id)
    {
        $user_id =Auth::user()->id;

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
        ]);
        $user = User::where('id', $user_id)->first();

        
        /* protection d'une duplication
        $name = User::where('name', $request->name)->first();
        $email = User::where('email', $request->email)->first();
        if($name)
        {
            Alert::warning('Error!', 'Nom d\'utilisateur déjà attribué !');
            return back();
        }elseif($email){
            Alert::warning('Error!', 'Nom d\'utilisateur déjà attribué !');
            return back();
        }else{
            
        }*/
        $info = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        User::whereId($id)->update($info);
        Alert::success('Succès!', 'Modification réussie');
        return back();
    }

    public function updatepicture(Request $request , $id)
    {
        // les infos de l'user
        $user_id =Auth::user()->id;

        $users = User::where('id', $user_id)->first();
        if($request->hasFile("file")){
            //on verifie si exite un fichier
            if(File::exists("/storage/{{$users->avatar}}")){
                File::delete("/storage/{{$users->avatar}}");
            }
            $file = $request->file('file');
            $file_img = Str::random(5) . '-' . $file->clientExtension();
            //$certificat_img = Str::random(12).'.'.$certificat->clientExtension();
            $storage_data = Storage::disk('public')->put($file_img, file_get_contents($file));
            $nouveau_info['avatar'] = $file_img;//si le fichier a été modifier on fait la mise a jour
        }
        User::whereId($id)->update($nouveau_info);
        Alert::success('Succès!', 'Modification réussie');
        return back();
    }
}
