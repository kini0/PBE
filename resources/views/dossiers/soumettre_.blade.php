@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formulaire de soumission des dossiers</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('soumettre') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="prenom" class="col-md-4 col-form-label text-md-end">{{ __('Prénom') }}</label>

                            <div class="col-md-6">
                                <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

                                @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="age" class="col-md-4 col-form-label text-md-end">{{ __('Votre âge') }}</label>

                            <div class="col-md-6">
                                <input id="age" type="text" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age" autofocus>

                                @error('age')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Contact') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="residence" class="col-md-4 col-form-label text-md-end">{{ __('Residence') }}</label>

                            <div class="col-md-6">
                                <input id="residence" type="text" class="form-control @error('residence') is-invalid @enderror" name="residence" value="{{ old('residence') }}" required autocomplete="residence" autofocus>

                                @error('residence')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <hr class="mt-2 mb-3" />


                        <div class="row mb-3">
                            <label for="diplome" class="col-md-4 col-form-label text-md-end">{{ __('Diplome') }}</label>

                            <div class="col-md-6">
                                <input id="diplome" type="text" class="form-control @error('diplome') is-invalid @enderror" name="diplome" value="{{ old('diplome') }}" required autocomplete="diplome" autofocus>

                                @error('diplome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="aetabl" class="col-md-4 col-form-label text-md-end">{{ __('Institure de Frequentation') }}</label>

                            <div class="col-md-6">
                                <input id="aetabl" type="text" class="form-control @error('aetabl') is-invalid @enderror" name="aetabl" value="{{ old('aetabl') }}" required autocomplete="aetabl" autofocus>

                                @error('aetabl')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <hr class="mt-2 mb-3" />


                        <div class="row mb-3">
                            <label for="detabl" class="col-md-4 col-form-label text-md-end">{{ __('Institure Souhaitée') }}</label>

                            <div class="col-md-6">
                                <input id="detabl" type="text" class="form-control @error('aetabl') is-invalid @enderror" name="detabl" value="{{ old('detabl') }}" required autocomplete="detabl" autofocus>

                                @error('detabl')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="filiere" class="col-md-4 col-form-label text-md-end">{{ __('Domaine d\'Etude') }}</label>

                            <div class="col-md-6">
                                <input id="filiere" type="text" class="form-control @error('filiere') is-invalid @enderror" name="filiere" value="{{ old('filiere') }}" required autocomplete="filiere" autofocus>

                                @error('filiere')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="pays" class="col-md-4 col-form-label text-md-end">{{ __('Pays') }}</label>

                            <div class="col-md-6">
                                <input id="pays" type="text" class="form-control @error('aetabl') is-invalid @enderror" name="pays" value="{{ old('pays') }}" required autocomplete="pays" autofocus>

                                @error('pays')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <hr class="mt-2 mb-3" />

                        <div class="row mb-3">
                            <label for="certificat" class="col-md-4 col-form-label text-md-end">{{ __('Certificat') }}</label>

                            <div class="col-md-6">
                                <input id="certificat" type="file" class="form-control @error('certificat') is-invalid @enderror" name="certificat" value="{{ old('certificat') }}" accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG, .pdf, .docs">
                                @error('certificat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cv" class="col-md-4 col-form-label text-md-end">{{ __('CV') }}</label>

                            <div class="col-md-6">
                                <input id="cv" type="file" class="form-control @error('cv') is-invalid @enderror" name="cv" value="{{ old('cv') }}" accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG, .pdf, .docs">
                                @error('cv')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="recu" class="col-md-4 col-form-label text-md-end">{{ __('Réçu de pré-inscription') }}</label>

                            <div class="col-md-6">
                                <input id="recu" type="file" class="form-control @error('recu') is-invalid @enderror" name="recu" value="{{ old('recu') }}" accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG, .pdf, .docs">
                                @error('recu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lrecommandation" class="col-md-4 col-form-label text-md-end">{{ __('Lettres de recommandation') }}</label>

                            <div class="col-md-6">
                                <input id="lrecommandation" type="file" class="form-control @error('lrecommandation') is-invalid @enderror" name="lrecommandation" value="{{ old('lrecommandation') }}" accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG, .pdf, .docs">
                                @error('lrecommandation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ldemande" class="col-md-4 col-form-label text-md-end">{{ __(' Lettre de demande d\'aide') }}</label>

                            <div class="col-md-6">
                                <input id="ldemande" type="file" class="form-control @error('ldemande') is-invalid @enderror" name="ldemande" value="{{ old('ldemande') }}" accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG, .pdf, .docs">
                                @error('ldemande')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lmotivation" class="col-md-4 col-form-label text-md-end">{{ __(' Lettre de motivation') }}</label>

                            <div class="col-md-6">
                                <input id="lmotivation" type="file" class="form-control @error('lmotivation') is-invalid @enderror" name="lmotivation" value="{{ old('lmotivation') }}" accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG, .pdf, .docs">
                                @error('lmotivation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="imgdiplome" class="col-md-4 col-form-label text-md-end">{{ __(' Copies légalisées des diplômes obtenus') }}</label>

                            <div class="col-md-6">
                                <input id="imgdiplome" type="file" class="form-control @error('imgdiplome') is-invalid @enderror" name="imgdiplome" value="{{ old('imgdiplome') }}" accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG, .pdf, .docs">
                                @error('imgdiplome')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="note" class="col-md-4 col-form-label text-md-end">{{ __('Relevés de note à partir du BAC') }}</label>

                            <div class="col-md-6">
                                <input id="note" type="file" class="form-control @error('note') is-invalid @enderror" name="note" value="{{ old('note') }}" accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG, .pdf, .docs">
                                @error('note')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="projet" class="col-md-4 col-form-label text-md-end">{{ __('Projet d’étude ou Projet de recherche') }}</label>

                            <div class="col-md-6">
                                <input id="projet" type="file" class="form-control @error('projet') is-invalid @enderror" name="projet" value="{{ old('projet') }}" accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG, .pdf, .docs">
                                @error('projet')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Soumettre') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection