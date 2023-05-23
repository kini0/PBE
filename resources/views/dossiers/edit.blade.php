@extends('layouts.candidat.app1')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <div class="card-header">Formulaire de soumission des dossiers</div>

                    <div class="card-body">
                        <form method="POST" action="/dossiers/update/{{$dossier->id}}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row mb-3">
                                <label for="nom" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                                <div class="col-md-6">
                                    <input id="nom" type="text" class="form-control" name="nom" value="{{ $dossier->nom}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="prenom" class="col-md-4 col-form-label text-md-end">{{ __('Prénom') }}</label>

                                <div class="col-md-6">
                                    <input id="prenom" type="text" class="form-control" name="prenom" value="{{ $dossier->prenom}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="age" class="col-md-4 col-form-label text-md-end">{{ __('Votre âge') }}</label>

                                <div class="col-md-6">
                                    <input id="age" type="text" class="form-control" name="age" value="{{ $dossier->age}}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Contact') }}</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{ $dossier->phone }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="residence" class="col-md-4 col-form-label text-md-end">{{ __('Residence') }}</label>

                                <div class="col-md-6">
                                    <input id="residence" type="text" class="form-control" name="residence" value="{{ $dossier->residence }}">
                                </div>
                            </div>

                            <hr class="mt-2 mb-3" />


                            <div class="row mb-3">
                                <label for="diplome" class="col-md-4 col-form-label text-md-end">{{ __('Diplome') }}</label>

                                <div class="col-md-6">
                                    <input id="diplome" type="text" class="form-control" name="diplome" value="{{ $dossier->diplome }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="aetabl" class="col-md-4 col-form-label text-md-end">{{ __('Institure de Frequentation') }}</label>

                                <div class="col-md-6">
                                    <input id="aetabl" type="text" class="form-control" name="aetabl" value="{{ $dossier->aetabl}}">
                                </div>
                            </div>
                            <hr class="mt-2 mb-3" />


                            <div class="row mb-3">
                                <label for="detabl" class="col-md-4 col-form-label text-md-end">{{ __('Institure Souhaitée') }}</label>

                                <div class="col-md-6">
                                    <input id="detabl" type="text" class="form-control" name="detabl" value="{{ $dossier->detabl }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="filiere" class="col-md-4 col-form-label text-md-end">{{ __('Domaine d\'Etude') }}</label>

                                <div class="col-md-6">
                                    <input id="filiere" type="text" class="form-control" name="filiere" value="{{ $dossier->filiere }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="pays" class="col-md-4 col-form-label text-md-end">{{ __('Pays') }}</label>

                                <div class="col-md-6">
                                    <input id="pays" type="text" class="form-control" name="pays" value="{{ $dossier->pays }}">
                                </div>
                            </div>
                            <hr class="mt-2 mb-3" />

                            <div class="row mb-3">
                                <label for="certificat" class="col-md-4 col-form-label text-md-end">{{ __('Certificat') }}</label>

                                <div class="col-md-6">
                                    <img src="/storage/{{$dossier->certificat}}" alt="Votre certificat" width="50%" height="113"><br>
                                    <input id="certificat" type="file" class="form-control" name="certificat" accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG, .pdf, .docs">

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="cv" class="col-md-4 col-form-label text-md-end">{{ __('CV') }}</label>

                                <div class="col-md-6">
                                    <img src="/storage/{{$dossier->cv}}" alt="Votre cv" width="50%" height="113"><br>
                                    <input id="cv" type="file" class="form-control" name="cv" accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG, .pdf, .docs">

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="recu" class="col-md-4 col-form-label text-md-end">{{ __('Réçu de pré-inscription') }}</label>

                                <div class="col-md-6">
                                    <img src="/storage/{{$dossier->recu}}" alt="Votre recu" width="50%" height="113"><br>
                                    <input id="recu" type="file" class="form-control" name="recu" accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG, .pdf, .docs">

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="lrecommandation" class="col-md-4 col-form-label text-md-end">{{ __('Lettres de recommandation') }}</label>

                                <div class="col-md-6">
                                    <img src="/storage/{{$dossier->lrecommandation}}" alt="Votre lettre commandation" width="50%" height="113"><br>
                                    <input id="lrecommandation" type="file" class="form-control" name="lrecommandation" accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG, .pdf, .docs">


                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="ldemande" class="col-md-4 col-form-label text-md-end">{{ __(' Lettre de demande d\'aide') }}</label>

                                <div class="col-md-6">
                                    <img src="/storage/{{$dossier->ldemande}}" alt="Votre lettre demande" width="50%" height="113"><br>
                                    <input id="ldemande" type="file" class="form-control" name="ldemande" accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG, .pdf, .docs">

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="lmotivation" class="col-md-4 col-form-label text-md-end">{{ __(' Lettre de motivation') }}</label>

                                <div class="col-md-6">
                                    <img src="/storage/{{$dossier->lmotivation}}" alt="Votre lettre motivation" width="50%" height="113"><br>
                                    <input id="lmotivation" type="file" class="form-control" name="lmotivation" accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG, .pdf, .docs">

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="imgdiplome" class="col-md-4 col-form-label text-md-end">{{ __(' Copies légalisées des diplômes obtenus') }}</label>

                                <div class="col-md-6">
                                    <img src="/storage/{{$dossier->imgdiplome}}" alt="Votre diôme en image" width="50%" height="113"><br>
                                    <input id="imgdiplome" type="file" class="form-control" name="imgdiplome" accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG, .pdf, .docs">

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="note" class="col-md-4 col-form-label text-md-end">{{ __('Relevés de note à partir du BAC') }}</label>

                                <div class="col-md-6">
                                    <img src="/storage/{{$dossier->note}}" alt="Votre note" width="50%" height="113"><br>
                                    <input id="note" type="file" class="form-control" name="note" accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG, .pdf, .docs">

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="projet" class="col-md-4 col-form-label text-md-end">{{ __('Projet d’étude ou Projet de recherche') }}</label>

                                <div class="col-md-6">
                                    <img src="/storage/{{$dossier->projet}}" alt="Votre projet" width="50%" height="113"><br>
                                    <input id="projet" type="file" class="form-control" name="projet" accept=".jpg, .jpeg, .png, .JPG, .JPEG, .PNG, .pdf, .docs">


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