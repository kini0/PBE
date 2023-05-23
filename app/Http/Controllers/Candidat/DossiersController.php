<?php

namespace App\Http\Controllers\Candidat;

use File;
use App\Http\Controllers\Controller;
use App\Models\Dossier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DossiersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dossiers = Dossier::all();
        return view('dossiers.soumettre', compact('dossiers'));
        //return view('dossiers.soumettre')->with('dossiers',$dossiers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dossiers.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'age' => ['required'],
            'phone' => ['required'],
            'residence' => ['required'],
            'diplome' => ['required'],
            'aetabl' => ['required'],
            'detabl' => ['required'],
            'filiere' => ['required'],
            'pays' => ['required'],

        ]);


        $certificat = $request->file('certificat');
        $certificat_img = time() . '-' . $certificat->getClientOriginalName();
        //$certificat_img = Str::random(12).'.'.$certificat->clientExtension();//aprendre a formationle non de nos fichiers getClientO
        $storage_data = Storage::disk('public')->put($certificat_img, file_get_contents($certificat));


        $cv = $request->file('cv');
        //$cv_img = Str::random(12).'.'.$cv->clientExtension();
        $cv_img = time() . '-' . $cv->getClientOriginalName();
        $storage_data = Storage::disk('public')->put($cv_img, file_get_contents($cv));

        $recu = $request->file('recu');
        //$recu_img = Str::random(12).'.'.$recu->clientExtension();
        $recu_img = time() . '-' . $recu->getClientOriginalName();
        $storage_data = Storage::disk('public')->put($recu_img, file_get_contents($recu));

        $lrecommandation = $request->file('lrecommandation');
        $lrecommandation_img = time() . '-' . $lrecommandation->getClientOriginalName();
        //$lrecommandation_img = Str::random(12).'.'.$lrecommandation->clientExtension();//foramtage avec un nom aleatoire
        $storage_data = Storage::disk('public')->put($lrecommandation_img, file_get_contents($lrecommandation));

        $ldemande = $request->file('ldemande');
        $ldemande_img = time() . '-' . $ldemande->getClientOriginalName();
        //$ldemande_img = Str::random(12).'.'.$ldemande->clientExtension();
        $storage_data = Storage::disk('public')->put($ldemande_img, file_get_contents($ldemande));


        $lmotivation = $request->file('lmotivation');
        $lmotivation_img = time() . '-' . $lmotivation->getClientOriginalName();
        //$lmotivation_img = Str::random(12).'.'.$lmotivation->clientExtension();
        $storage_data = Storage::disk('public')->put($lmotivation_img, file_get_contents($lmotivation));


        $imgdiplome = $request->file('imgdiplome');
        $imgdiplome_img = time() . '-' . $imgdiplome->getClientOriginalName();
        //$imgdiplome_img = Str::random(12).'.'.$imgdiplome->clientExtension();
        $storage_data = Storage::disk('public')->put($imgdiplome_img, file_get_contents($imgdiplome));

        $note = $request->file('note');
        $note_img = time() . '-' . $note->getClientOriginalName();
        //$note_img = Str::random(12).'.'.$note->clientExtension();
        $storage_data = Storage::disk('public')->put($note_img, file_get_contents($note));

        $projet = $request->file('projet');
        $projet_img = time() . '-' . $projet->getClientOriginalName();
        //$projet_img = Str::random(12).'.'.$projet->clientExtension();
        $storage_data = Storage::disk('public')->put($projet_img, file_get_contents($projet));

        ///dd($projet_img);
        //on stock le nom de la variable de l'image dans la base de donnée= $name_

        Dossier::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'age' => $request->age,
            'phone' => $request->phone,
            'residence' => $request->residence,
            'certificat' => $certificat_img,
            'cv' => $cv_img,
            'recu' => $recu_img,
            'lrecommandation' => $lrecommandation_img,
            'ldemande' => $ldemande_img,
            'lmotivation' => $lmotivation_img,
            'imgdiplome' => $imgdiplome_img,
            'note' => $note_img,
            'projet' => $projet_img,
            'user_id' =>$request->user_id,
            'aetabl' =>$request->aetabl,
            'diplome' => $request->diplome,
            'detabl' => $request->detabl,
            'filiere' => $request->filiere,
            'pays' => $request->pays,
        ]);
        Alert::success('Succès!', 'Bienvenue sur votre tableau de bord');
        return redirect()->route('candidat');
        //dd();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //la fonction show permet d'afficher
        //dd($dossier);
        //dd($id);
        $dossier = Dossier::where('id', $id)->first();
        return view('dossiers.show', compact('dossier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dossier = Dossier::where('id', $id)->first();
        return view('dossiers.edit', compact('dossier'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'age' => ['required'],
            'phone' => ['required'],
            'residence' => ['required'],
            'diplome' => ['required'],
            'aetabl' => ['required'],
            'detabl' => ['required'],
            'filiere' => ['required'],
            'pays' => ['required'],

        ]);

        $dossier = Dossier::where('id', $id)->first();// on recupère la première occurence du doc

        $nouveau_info = [
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'age' => $request->age,
            'phone' => $request->phone,
            'aetabl' =>$request->aetabl,
            'diplome' => $request->diplome,
            'detabl' => $request->detabl,
            'filiere' => $request->filiere,
            'pays' => $request->pays,
        ]; //la varible permet de creer les données du modèl

        //on vérifie l'existance du repectoire de stockage des fichiers
        if($request->hasFile("certificat")){
            //on verifie si exite un fichier
            if(File::exists("/storage/{{$dossier->certificat}}")){
                File::delete("/storage/{{$dossier->certificat}}");
            }
            $certificat = $request->file('certificat');
            $certificat_img = time() . '-' . $certificat->getClientOriginalName();
            //$certificat_img = Str::random(12).'.'.$certificat->clientExtension();
            $storage_data = Storage::disk('public')->put($certificat_img, file_get_contents($certificat));
            $nouveau_info['certificat'] = $certificat_img;//si le fichier a été modifier on fait la mise a jour
        }
        //dd($certificat_img);

        if($request->hasFile("cv")){
            //on verifie si exite un fichier
            if(File::exists("/storage/{{$dossier->cv}}")){
                File::delete("/storage/{{$dossier->cv}}");
            }
            $cv = $request->file('cv');
            $cv_img = time() . '-' . $cv->getClientOriginalName();
            //$cv_img = Str::random(12).'.'.$cv->clientExtension();
            $storage_data = Storage::disk('public')->put($cv_img, file_get_contents($cv));
            $nouveau_info['cv'] = $cv_img;// si le fichier a été modifier on fait la mise a jour
        }

        if($request->hasFile("recu")){
            //on verifie si exite un fichier
            if(File::exists("/storage/{{$dossier->recu}}")){
                File::delete("/storage/{{$dossier->recu}}");
            }
            $recu = $request->file('recu');
            $recu_img = time() . '-' . $recu->getClientOriginalName();
            //$recu_img = Str::random(12).'.'.$recu->clientExtension();
            $storage_data = Storage::disk('public')->put($recu_img, file_get_contents($recu));
            $nouveau_info['recu'] = $recu_img;
        }

        if($request->hasFile("lrecommandation")){
            //on verifie si exite un fichier
            if(File::exists("/storage/{{$dossier->lrecommandation}}")){
                File::delete("/storage/{{$dossier->lrecommandation}}");
            }
            $lrecommandation = $request->file('lrecommandation');
            $lrecommandation_img = time() . '-' . $lrecommandation->getClientOriginalName();
            //$lrecommandation_img = Str::random(12).'.'.$lrecommandation->clientExtension();
            $storage_data = Storage::disk('public')->put($lrecommandation_img, file_get_contents($lrecommandation));
            $nouveau_info['lrecommandation'] = $lrecommandation_img;
        }

        if($request->hasFile("ldemande")){
            //on verifie si exite un fichier
            if(File::exists("/storage/{{$dossier->ldemande}}")){
                File::delete("/storage/{{$dossier->ldemande}}");
            }
            $ldemande = $request->file('ldemande');
            $ldemande_img = time() . '-' . $ldemande->getClientOriginalName();
            //$ldemande_img = Str::random(12).'.'.$ldemande->clientExtension();
            $storage_data = Storage::disk('public')->put($ldemande_img, file_get_contents($ldemande));
            $nouveau_info['ldemande'] = $ldemande_img;
        }

        if($request->hasFile("lmotivation")){
            //on verifie si exite un fichier
            if(File::exists("/storage/{{$dossier->lmotivation}}")){
                File::delete("/storage/{{$dossier->lmotivation}}");
            }
            $lmotivation = $request->file('lmotivation');
            $lmotivation_img = time() . '-' . $lmotivation->getClientOriginalName();
            //$lmotivation_img = Str::random(12).'.'.$lmotivation->clientExtension();
            $storage_data = Storage::disk('public')->put($lmotivation_img, file_get_contents($lmotivation));
            $nouveau_info['lmotivation'] = $lmotivation_img;
        }

        if($request->hasFile("imgdiplome")){
            //on verifie si exite un fichier
            if(File::exists("/storage/{{$dossier->imgdiplome}}")){
                File::delete("/storage/{{$dossier->imgdiplome}}");
            }
            $imgdiplome = $request->file('imgdiplome');
            $imgdiplome_img = time() . '-' . $imgdiplome->getClientOriginalName();
            //$imgdiplome_img = Str::random(12).'.'.$imgdiplome->clientExtension();
            $storage_data = Storage::disk('public')->put($imgdiplome_img, file_get_contents($imgdiplome));
            $nouveau_info['imgdiplome'] = $imgdiplome_img;
        }

        if($request->hasFile("note")){
            //on verifie si exite un fichier
            if(File::exists("/storage/{{$dossier->note}}")){
                File::delete("/storage/{{$dossier->note}}");
            }
            $note = $request->file('note');
            $note_img = time() . '-' . $note->getClientOriginalName();
            //$note_img = Str::random(12).'.'.$note->clientExtension();
            $storage_data = Storage::disk('public')->put($note_img, file_get_contents($note));
            $nouveau_info['note'] = $note_img;
        }

        if($request->hasFile("projet")){
            //on verifie si exite un fichier
            if(File::exists("/storage/{{$dossier->projet}}")){
                File::delete("/storage/{{$dossier->projet}}");
            }
            $projet = $request->file('projet');
            $projet_img = time() . '-' . $projet->getClientOriginalName();
            //$projet_img = Str::random(12).'.'.$projet->clientExtension();
            $storage_data = Storage::disk('public')->put($projet_img, file_get_contents($projet));
            $nouveau_info['projet'] = $projet_img;
        }


        Dossier::whereId($id)->update($nouveau_info);
        Alert::success('Succès!', 'Modification réussie');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dossier  $dossier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dossier $dossier)
    {
        //
    }
}
