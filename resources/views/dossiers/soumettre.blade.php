@extends('layouts.connection.app1')

@section('content')
<div id="Form_Connect1">
    <div id="logo">
        <a href="index.php"><img src="{{ asset('images/LOGO PROGRAMME BOURSES.png') }}" width="130" title="retour accueil" /></a>
    </div>
    <div id="tableauform">
        <form method="POST" action="{{ route('soumettre') }}" enctype="multipart/form-data">
            @csrf
            <i class="fa fa-envelope" style="font-size:14px; color:#343995"></i><label for="user_field" class="Style20" style="color:#343995"> Nom </label>
            <span class="Style290">
                <input type="text" id="nom" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                @error('nom')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </span>

            <i class="fa fa-envelope" style="font-size:14px; color:#343995"></i><label for="user_field" class="Style20" style="color:#343995"> Prénom</label>
            <span class="Style290">
                <input type="text" id="prenom" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>
                @error('prenom')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </span>

            <i class="fa fa-envelope" style="font-size:14px; color:#343995"></i><label for="user_field" class="Style20" style="color:#343995"> Âge </label>
            <span class="Style290">
                <input type="text" id="age" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" autofocus>
                @error('age')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </span>

            <i class="fa fa-envelope" style="font-size:14px; color:#343995"></i><label for="user_field" class="Style20" style="color:#343995"> Contact </label>
            <span class="Style290">
                <input type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </span>

            <i class="fa fa-envelope" style="font-size:14px; color:#343995"></i><label for="user_field" class="Style20" style="color:#343995"> Residence </label>
            <span class="Style290">
                <input type="text" id="residence" class="form-control @error('residence') is-invalid @enderror" name="residence" value="{{ old('residence') }}" required autocomplete="residence" autofocus>
                @error('residence')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </span>

            <i class="fa fa-envelope" style="font-size:14px; color:#343995"></i><label for="user_field" class="Style20" style="color:#343995"> Diplôme </label>
            <span class="Style290">
                <input type="text" id="diplome" class="form-control @error('diplome') is-invalid @enderror" name="diplome" value="{{ old('diplome') }}" required autocomplete="diplome" autofocus>
                @error('diplome')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </span>

            <i class="fa fa-envelope" style="font-size:14px; color:#343995"></i><label for="user_field" class="Style20" style="color:#343995"> Institute de Frequentation </label>
            <span class="Style290">
                <input type="text" id="aetabl" class="form-control @error('aetabl') is-invalid @enderror" name="aetabl" value="{{ old('aetabl') }}" required autocomplete="aetabl" autofocus>
                @error('aetabl')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </span>

            <i class="fa fa-envelope" style="font-size:14px; color:#343995"></i><label for="user_field" class="Style20" style="color:#343995"> Institute Souhaitée </label>
            <span class="Style290">
                <input type="text" id="detabl" class="form-control @error('detabl') is-invalid @enderror" name="detabl" value="{{ old('detabl') }}" required autocomplete="detabl" autofocus>
                @error('detabl')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </span>

            <i class="fa fa-envelope" style="font-size:14px; color:#343995"></i><label for="user_field" class="Style20" style="color:#343995"> Domaine d\'Etude </label>
            <span class="Style290">
                <input type="text" id="filiere" class="form-control @error('filiere') is-invalid @enderror" name="filiere" value="{{ old('filiere') }}" required autocomplete="filiere" autofocus>
                @error('filiere')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </span>

            <i class="fa fa-envelope" style="font-size:14px; color:#343995"></i><label for="user_field" class="Style20" style="color:#343995"> Pays</label>
            <span class="Style290">
                <input type="text" id="pays" class="form-control @error('pays') is-invalid @enderror" name="pays" value="{{ old('pays') }}" required autocomplete="pays" autofocus>
                @error('pays')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </span>

            <hr class="mt-2 mb-3" />

            <i class="fa fa-envelope" style="font-size:14px; color:#343995"></i><label for="user_field" class="Style20" style="color:#343995"> Certificat</label>
            <span class="Style290">
                <input type="file" id="certificat" class="form-control @error('pays') is-invalid @enderror" name="certificat" value="{{ old('certificat') }}" required autocomplete="certificat" autofocus>
                @error('certificat')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </span>

            <i class="fa fa-envelope" style="font-size:14px; color:#343995"></i><label for="user_field" class="Style20" style="color:#343995"> CV</label>
            <span class="Style290">
                <input type="file" id="cv" class="form-control @error('cv') is-invalid @enderror" name="cv" value="{{ old('cv') }}" required autocomplete="cv" autofocus>
                @error('cv')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </span>

            <i class="fa fa-envelope" style="font-size:14px; color:#343995"></i><label for="user_field" class="Style20" style="color:#343995"> Réçu de pré-inscription</label>
            <span class="Style290">
                <input type="file" id="recu" class="form-control @error('recu') is-invalid @enderror" name="recu" value="{{ old('recu') }}" required autocomplete="recu" autofocus>
                @error('recu')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </span>

            <i class="fa fa-envelope" style="font-size:14px; color:#343995"></i><label for="user_field" class="Style20" style="color:#343995"> Lettres de recommandation</label>
            <span class="Style290">
                <input type="file" id="lrecommandation" class="form-control @error('lrecommandation') is-invalid @enderror" name="lrecommandation" value="{{ old('lrecommandation') }}" required autocomplete="lrecommandation" autofocus>
                @error('lrecommandation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </span>

            <i class="fa fa-envelope" style="font-size:14px; color:#343995"></i><label for="user_field" class="Style20" style="color:#343995"> Lettre de demande d\'aide</label>
            <span class="Style290">
                <input type="file" id="ldemande" class="form-control @error('ldemande') is-invalid @enderror" name="ldemande" value="{{ old('ldemande') }}" required autocomplete="ldemande" autofocus>
                @error('ldemande')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </span>

            <i class="fa fa-envelope" style="font-size:14px; color:#343995"></i><label for="user_field" class="Style20" style="color:#343995"> Lettre de motivation</label>
            <span class="Style290">
                <input type="file" id="lmotivation" class="form-control @error('lmotivation') is-invalid @enderror" name="lmotivation" value="{{ old('lmotivation') }}" required autocomplete="lmotivation" autofocus>
                @error('lmotivation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </span>

            <i class="fa fa-envelope" style="font-size:14px; color:#343995"></i><label for="user_field" class="Style20" style="color:#343995"> Copies légalisées des diplômes obtenus</label>
            <span class="Style290">
                <input type="file" id="imgdiplome" class="form-control @error('imgdiplome') is-invalid @enderror" name="imgdiplome" value="{{ old('imgdiplome') }}" required autocomplete="imgdiplome" autofocus>
                @error('imgdiplome')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </span>

            <i class="fa fa-envelope" style="font-size:14px; color:#343995"></i><label for="user_field" class="Style20" style="color:#343995"> Relevés de note à partir du BAC</label>
            <span class="Style290">
                <input type="file" id="note" class="form-control @error('note') is-invalid @enderror" name="note" value="{{ old('note') }}" required autocomplete="note" autofocus>
                @error('note')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </span>

            <i class="fa fa-envelope" style="font-size:14px; color:#343995"></i><label for="user_field" class="Style20" style="color:#343995"> Projet d’étude ou Projet de recherche</label>
            <span class="Style290">
                <input type="file" id="projet" class="form-control @error('projet') is-invalid @enderror" name="projet" value="{{ old('projet') }}" required autocomplete="projet" autofocus>
                @error('projet')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </span>

            <input type="submit" name="submit" value="Soumettre">

        </form><br />
    </div>
</div>
@endsection